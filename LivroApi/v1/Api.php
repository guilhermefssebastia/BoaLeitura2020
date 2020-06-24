<?php 


	require_once '../includes/DbOperation.php';

	function isTheseParametersAvailable($params){
	
		$available = true; 
		$missingparams = ""; 
		
		foreach($params as $param){
			if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
				$available = false; 
				$missingparams = $missingparams . ", " . $param; 
			}
		}
		
		
		if(!$available){
			$response = array(); 
			$response['error'] = true; 
			$response['message'] = 'Parameters ' . substr($missingparams, 1, strlen($missingparams)) . ' missing';
			
		
			echo json_encode($response);
			
		
			die();
		}
	}
	
	
	$response = array();
	
	// tbcadastrocli
	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
	
			case 'createCadastroCli':
				
				isTheseParametersAvailable(array('codCli','nomeCli','CPFcli','emailCli','EndCli','TelCli',''));
				
				$db = new DbOperation();
				
				$result = $db->createCadastroCli(
					$_POST['codCli'],
					$_POST['nomeCli'],
					$_POST['CPFcli'],
					$_POST['emailCli'],
					$_POST['EndCli'],
					$_POST['TelCli']					
				);
				

			
				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'Cliente adicionado com sucesso';

					
					$response['tbcadastrocli'] = $db->getCadastroCli();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			
		
			case 'getCadastroCli':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['tbcadastrocli'] = $db->getCadastroCli();
			break; 
			
			
		
			case 'updateCadastroCli':
				isTheseParametersAvailable(array('codCli','nomeCli','CPFcli','emailCli','EndCli','TelCli'));
				$db = new DbOperation();
				$result = $db->updateCadastroCli(
					$_POST['codCli'],
					$_POST['nomeCli'],
					$_POST['CPFcli'],
					$_POST['emailCli'],
					$_POST['EndCli'],
					$_POST['TelCli']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Cliente atualizado com sucesso';
					$response['tbcadastrocli'] = $db->getCadastroCli();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break; 
			
			
			case 'deleteCadastroCli':

				
				if(isset($_GET['codCli'])){
					$db = new DbOperation();
					if($db->deleteCadastroCli($_GET['codCli'])){
						$response['error'] = false; 
						$response['message'] = 'Cliente excluído com sucesso';
						$response['tbcadastrocli'] = $db->getCadastroCli();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um id por favor';
				}
			break; 
		}
		
	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}





	// tbcadastrolivros
	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
	
			case 'createCadastroLivro':
				
				isTheseParametersAvailable(array('nomeLivro','IBSNlivro','autor','donoLivro'));
				
				$db = new DbOperation();
				
				$result = $db->createCadastroLivro(
					$_POST['nomeLivro'],
					$_POST['IBSNlivro'],
					$_POST['autor'],
					$_POST['donoLivro']
				
				);
				

			
				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'Livro adicionado com sucesso';

					
					$response['tbcadastrolivros'] = $db->getCadastroLivro();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			
		
			case 'getCadastroLivro':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['tbcadastrolivros'] = $db->getCadastroLivro();
			break; 
			
			
		
			case 'updateCadastroLivro':
				isTheseParametersAvailable(array('codLivro','nomeLivro','IBSNlivro','autor','donoLivro'));
				$db = new DbOperation();
				$result = $db->updateCadastroLivro(
					$_POST['codLivro'],
					$_POST['nomeLivro'],
					$_POST['IBSNlivro'],
					$_POST['autor'],
					$_POST['donoLivro']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Livro atualizado com sucesso';
					$response['tbcadastrolivros'] = $db->getCadastroLivro();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break; 
			
			
			case 'deleteCadastroLivros':

				
				if(isset($_GET['codLivro'])){
					$db = new DbOperation();
					if($db->deleteCadastroLivro($_GET['codLivro'])){
						$response['error'] = false; 
						$response['message'] = 'Livro excluído com sucesso';
						$response['tbcadastrolivros'] = $db->getCadastroLivro();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um id por favor';
				}
			break; 
		}
		
	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}


	// tbconta
	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
	
			case 'createConta':
				
				isTheseParametersAvailable(array('codConta','NomeConta','SenhaConta','codCli',''));
				
				$db = new DbOperation();
				
				$result = $db->createConta(
					$_POST['codConta'],
					$_POST['NomeConta'],
					$_POST['SenhaConta'],
					$_POST['codCli']					
				);
				

			
				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'Conta adicionado com sucesso';

					
					$response['tbconta'] = $db->getConta();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			
		
			case 'getConta':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['tbconta'] = $db->getConta();
			break; 
			
			
		
			case 'updateConta':
				isTheseParametersAvailable(array('codConta','NomeConta','SenhaConta','codCli'));
				$db = new DbOperation();
				$result = $db->updateConta(
					$_POST['codConta'],
					$_POST['NomeConta'],
					$_POST['SenhaConta'],
					$_POST['codCli']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Conta atualizado com sucesso';
					$response['tbconta'] = $db->getConta();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break; 
			
			
			case 'deleteConta':

				
				if(isset($_GET['id'])){
					$db = new DbOperation();
					if($db->deleteConta($_GET['codConta'])){
						$response['error'] = false; 
						$response['message'] = 'Conta excluído com sucesso';
						$response['tbconta'] = $db->getConta();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um id por favor';
				}
			break; 
		}
		
	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}

	// tbusuario
	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
	
			case 'createUsuario':
				
				isTheseParametersAvailable(array('codUsu','codCli','nomeUsu','senhaUsu',''));
				
				$db = new DbOperation();
				
				$result = $db->createUsuario(
					$_POST['codUsu'],
					$_POST['codCli'],
					$_POST['nomeUsu'],
					$_POST['senhaUsu']					
				);
				

			
				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'Usuario adicionado com sucesso';

					
					$response['tbusuario'] = $db->getUsuario();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			
		
			case 'getUsuario':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['tbusuario'] = $db->getUsuario();
			break; 
			
			
		
			case 'updateUsuario':
				isTheseParametersAvailable(array('codUsu','codCli','nomeUsu','senhaUsu'));
				$db = new DbOperation();
				$result = $db->updateUsuario(
					$_POST['codUsu'],
					$_POST['codCli'],
					$_POST['nomeUsu'],
					$_POST['senhaUsu']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Usuario atualizado com sucesso';
					$response['tbusuario'] = $db->getUsuario();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break; 
			
			
			case 'deleteUsuario':

				
				if(isset($_GET['id'])){
					$db = new DbOperation();
					if($db->deleteUsuario($_GET['codUsu'])){
						$response['error'] = false; 
						$response['message'] = 'Usuario excluído com sucesso';
						$response['tbusuario'] = $db->getUsuario();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um id por favor';
				}
			break; 
		}
		
	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}

	echo json_encode($response);
	
	
