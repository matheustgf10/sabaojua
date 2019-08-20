<?php 

	class TaxpayerViewTable implements ViewAbstarct{

		private $Taxpayer;
		private $headerTableTaxpayer = 	"<table>
									<thead>
										<th>Controle</th>
										<th>Contribuinte</th>
										<th>Beneficiário</th>
										<th>Data de Coleta</th>
										<th>QDT. Óleo (KG)</th>
										<th>Val. Corres.</th>
										<th>Val. Repass.</th>
									</thead>
									<tbody>";
		private $endTable =	"</tbody>";


		// @Override
		public function show(){

			echo $headerTableTaxpayer;
			
			for($i = 0; $i > $this->taxpayer->count(); $i++){
				echo 	 "<td>". $this->taxpayer['control'][$i];."</td>"
						."<td>". $this->taxpayer['control'][$i];."</td>"
						."<td>". $this->taxpayer['control'][$i];."</td>"
						."<td>". $this->taxpayer['control'][$i];."</td>"
						."<td>". $this->taxpayer['control'][$i];."</td>"
						."<td>". $this->taxpayer['control'][$i];."</td>"
						."<td>". $this->taxpayer['control'][$i];."</td>";

			}

			echo $endTable;
		}

	}
