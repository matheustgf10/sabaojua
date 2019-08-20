<?php 

	class TaxpayerController{

		private $TaxPayer;
		private $TaxPayerView;

		function __construct(){
			$this->TaxPayer = TaxPayer();
			$this->TaxPayerView = TaxPayerView();
			$this->TaxPayer->view($this->TaxPayerView);

		}


	}