<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionLivewire extends Component
{
    use WithPagination;
    
    public $auth;
    public $search = '';
    public $filterType = '';
    public $filterCategory = '';
    
    // Add Transaction
    public $addType;
    public $addCategory;
    public $addAmount;
    public $addDescription;
    public $addTransactionDate;
    
    // Edit Transaction
    public $editTransactionId;
    public $editType;
    public $editCategory;
    public $editAmount;
    public $editDescription;
    public $editTransactionDate;
    
    // Delete Transaction
    public $deleteTransactionId;
    public $deleteTransactionCategory;
    public $deleteTransactionConfirmCategory;
    
    protected $paginationTheme = 'bootstrap';
    
    public function mount()
    {
        $this->auth = Auth::user();
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updatingFilterType()
    {
        $this->resetPage();
    }
    
    public function updatingFilterCategory()
    {
        $this->resetPage();
    }
    
    public function render()
{
    $query = Transaction::where('user_id', $this->auth->id);
    
    // Search
    if ($this->search) {
        $query->where(function($q) {
            $q->where('category', 'like', '%' . $this->search . '%')
              ->orWhere('description', 'like', '%' . $this->search . '%');
        });
    }
    
    // Filter by type
    if ($this->filterType) {
        $query->where('type', $this->filterType);
    }
    
    // Filter by category
    if ($this->filterCategory) {
        $query->where('category', $this->filterCategory);
    }
    
    $transactions = $query->orderBy('transaction_date', 'desc')
                         ->orderBy('created_at', 'desc')
                         ->paginate(20);
    
    // Get categories for filter
    $categories = Transaction::where('user_id', $this->auth->id)
                             ->distinct()
                             ->pluck('category');
    
    // Get statistics
    $totalIncome = Transaction::where('user_id', $this->auth->id)
                              ->where('type', 'income')
                              ->sum('amount');
    
    $totalExpense = Transaction::where('user_id', $this->auth->id)
                               ->where('type', 'expense')
                               ->sum('amount');
    
    $balance = $totalIncome - $totalExpense;
    
    // Get chart data
    $chartData = $this->getChartData();
    
    $data = [
        'transactions' => $transactions,
        'categories' => $categories,
        'totalIncome' => $totalIncome,
        'totalExpense' => $totalExpense,
        'balance' => $balance,
        'chartData' => $chartData
    ];
    
    return view('livewire.transaction-livewire', $data);
}
    
    // Add Transaction
    public function addTransaction()
    {
        $this->validate([
            'addType' => 'required|in:income,expense',
            'addCategory' => 'required|string|max:255',
            'addAmount' => 'required|numeric|min:0',
            'addDescription' => 'nullable|string',
            'addTransactionDate' => 'required|date',
        ]);
        
        Transaction::create([
            'user_id' => $this->auth->id,
            'type' => $this->addType,
            'category' => $this->addCategory,
            'amount' => $this->addAmount,
            'description' => $this->addDescription,
            'transaction_date' => $this->addTransactionDate,
        ]);
        
        $this->reset(['addType', 'addCategory', 'addAmount', 'addDescription', 'addTransactionDate']);
        $this->dispatch('closeModal', id: 'addTransactionModal');
        $this->dispatch('showAlert', type: 'success', message: 'Transaksi berhasil ditambahkan!');
    }
    
    // Edit Transaction
    public function prepareEditTransaction($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        
        if (!$transaction) {
            return;
        }
        
        $this->editTransactionId = $transaction->id;
        $this->editType = $transaction->type;
        $this->editCategory = $transaction->category;
        $this->editAmount = $transaction->amount;
        $this->editDescription = $transaction->description;
        $this->editTransactionDate = $transaction->transaction_date->format('Y-m-d');
        
        $this->dispatch('showModal', id: 'editTransactionModal');
    }
    
    public function editTransaction()
    {
        $this->validate([
            'editType' => 'required|in:income,expense',
            'editCategory' => 'required|string|max:255',
            'editAmount' => 'required|numeric|min:0',
            'editDescription' => 'nullable|string',
            'editTransactionDate' => 'required|date',
        ]);
        
        $transaction = Transaction::where('id', $this->editTransactionId)->first();
        
        if (!$transaction) {
            $this->addError('editCategory', 'Data transaksi tidak tersedia.');
            return;
        }
        
        $transaction->type = $this->editType;
        $transaction->category = $this->editCategory;
        $transaction->amount = $this->editAmount;
        $transaction->description = $this->editDescription;
        $transaction->transaction_date = $this->editTransactionDate;
        $transaction->save();
        
        $this->reset(['editTransactionId', 'editType', 'editCategory', 'editAmount', 'editDescription', 'editTransactionDate']);
        $this->dispatch('closeModal', id: 'editTransactionModal');
        $this->dispatch('showAlert', type: 'success', message: 'Transaksi berhasil diubah!');
    }
    
    // Delete Transaction
    public function prepareDeleteTransaction($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        
        if (!$transaction) {
            return;
        }
        
        $this->deleteTransactionId = $transaction->id;
        $this->deleteTransactionCategory = $transaction->category;
        
        $this->dispatch('showModal', id: 'deleteTransactionModal');
    }
    
    public function deleteTransaction()
    {
        if ($this->deleteTransactionConfirmCategory !== $this->deleteTransactionCategory) {
            $this->addError('deleteTransactionConfirmCategory', 'Kategori konfirmasi tidak sesuai dengan kategori transaksi yang akan dihapus.');
            return;
        }
        
        Transaction::destroy($this->deleteTransactionId);
        
        $this->reset(['deleteTransactionId', 'deleteTransactionCategory', 'deleteTransactionConfirmCategory']);
        $this->dispatch('closeModal', id: 'deleteTransactionModal');
        $this->dispatch('showAlert', type: 'success', message: 'Transaksi berhasil dihapus!');
    }

    public function getChartData()
{
    // Data untuk chart per bulan (6 bulan terakhir)
    $months = [];
    $incomeData = [];
    $expenseData = [];
    
    for ($i = 5; $i >= 0; $i--) {
        $date = now()->subMonths($i);
        $monthYear = $date->format('Y-m');
        $monthName = $date->format('M Y');
        
        $income = Transaction::where('user_id', $this->auth->id)
                             ->where('type', 'income')
                             ->whereYear('transaction_date', $date->year)
                             ->whereMonth('transaction_date', $date->month)
                             ->sum('amount');
        
        $expense = Transaction::where('user_id', $this->auth->id)
                              ->where('type', 'expense')
                              ->whereYear('transaction_date', $date->year)
                              ->whereMonth('transaction_date', $date->month)
                              ->sum('amount');
        
        $months[] = $monthName;
        $incomeData[] = floatval($income);
        $expenseData[] = floatval($expense);
    }
    
    return [
        'months' => $months,
        'income' => $incomeData,
        'expense' => $expenseData
    ];
  }   
}