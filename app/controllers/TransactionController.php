<?php

class TransactionController extends Controller implements ResourceController{

    private $transactions;

    public function __construct(TransactionRepository $transactions) {
        $this->transactions = $transactions;
    }

    /**
     * Display all transactions.
     *
     * @return Response
     */
    public function index() {
		return View::make('transaction.index', ['transactions' => $this->transactions->paginate()]);
    }

    /**
     * Show the form for creating a new transaction.
     *
     * @return Response
     */
    public function create() {		
		if(Session::get('cashier_number') != null){
			return View::make('purchaseditem.create');
		}
		else{
			/* Get cashier number */
			return View::make('transaction.create');
		}
		
		//$transactionData['cashier_number'] = Input::get('cashier_number');                
        //$transactionData['id'] = $this->transactionRepository->add($transactionData);
        //return View::make('purchaseditem.create', $transactionData);
    }

    /**
     * Mark the specified transaction as void.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $this->transactions->delete($id);
        return Redirect::route('transactions.index');
    }

    /**
     * Store a newly created transaction in storage.
     *
     * @return Response
     */
    public function store() {
        try {
            $transactionData['cashier_number'] = Input::get('cashier_number');
            Session::put('cashier_number',$transactionData['cashier_number']);   
            return View::make('purchaseditem.create', $transactionData);
        } catch (UnauthorizedException $ex) {
            echo $ex->getMessage();
        }
        return Redirect::route('transactions.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $transaction = $this->transactions->find($id);
        $items = $transaction['purchasedItems'];
        return View::make('transaction.show', [
                    'items' => $items,
                    'id' => $id
        ]);
    }

    public function update($id){

    }

    public function edit($id){
         return View::make('transaction.edit', $id);
    }

}
