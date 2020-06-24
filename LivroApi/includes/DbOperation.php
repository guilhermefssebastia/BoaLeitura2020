<?php
 
class DbOperation
{
    
    private $con;
 
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnect.php';
 
     
        $db = new DbConnect();
 

        $this->con = $db->connect();
    }
	
	
	function createCadastroCli($codCli, $nomeCli, $CPFcli, $emailCli, $EndCli, $TelCli){
		$stmt = $this->con->prepare("INSERT INTO tbcadastrocli (codCli, nomeCli, CPFcli, emailCli, EndCli, TelCli) VALUES (?,?,?,?,?,?)");
		$stmt->bind_param("isisss", $codCli, $nomeCli, $CPFcli, $emailCli, $EndCli, $TelCli);
		if($stmt->execute())
			return true; 
		return false; 
	}

	function createCadastroLivro($nomeLivro, $IBSNlivro, $autor,$donoLivro){
		$stmt = $this->con->prepare("INSERT INTO tbcadastrolivros (nomeLivro, IBSNlivro, autor, donoLivro ) VALUES (?,?,?,?)");
		$stmt->bind_param("siss", $nomeLivro, $IBSNlivro, $autor, $donoLivro );
		if($stmt->execute())
			return true; 
		return false; 
	}

	function createConta($CodConta, $NomeConta, $SenhaConta, $codCli){
		$stmt = $this->con->prepare("INSERT INTO tbconta (CodConta, NomeConta, SenhaConta, codCli) VALUES (?,?,?,?)");
		$stmt->bind_param("issi", $CodConta, $NomeConta, $SenhaConta, $codCli);
		if($stmt->execute())
			return true; 
		return false; 
	}

	function createUsuario($codUsu, $codCli, $nomeUsu, $senhaUsu){
		$stmt = $this->con->prepare("INSERT INTO tbusuario (codUsu, codCli, nomeUsu, senhaUsu) VALUES (?,?,?,?)");
		$stmt->bind_param("iiss", $codUsu, $codCli, $nomeUsu, $senhaUsu);
		if($stmt->execute())
			return true; 
		return false; 
	}
		
	function getCadastroCli(){
		$stmt = $this->con->prepare("SELECT codCli, nomeCli, CPFcli, emailCli, EndCli, TelCli FROM tbcadastrocli");
		$stmt->execute();
		$stmt->bind_result($codCli, $nomeCli, $CPFcli, $emailCli, $EndCli, $TelCli);
		
		$cadastros = array(); 
		
		while($stmt->fetch()){
			$cadastro  = array();
			$cadastro['codCli'] = $codCli; 
			$cadastro['nomeCli'] = $nomeCli;
			$cadastro['CPFcli'] = $CPFcli;  
			$cadastro['emailCli'] = $emailCli; 
			$cadastro['EndCli'] = $EndCli;  
			$cadastro['TelCli'] = $TelCli; 

			
			array_push($cadastros, $cadastro); 
		}
		
		return $cadastros; 
	}
	
	function getCadastroLivro(){
		$stmt = $this->con->prepare("SELECT codCli, nomeLivro, IBSNlivro, autor, donoLivro FROM tbcadastrolivros");
		$stmt->execute();
		$stmt->bind_result($codLivro, $nomeLivro, $IBSNlivro, $autor, $donoLivro);
		
		$cadastros = array(); 
		
		while($stmt->fetch()){
			$cadastro  = array();
			$cadastro['codCli'] = $codCli;
			$cadastro['nomeLivro'] = $nomeLivro;
			$cadastro['IBSNlivro'] = $IBSNlivro;  
			$cadastro['autor'] = $autor; 
			$cadastro['donoLivro']= $donoLivro;

			
			array_push($cadastros, $cadastro); 
		}
		
		return $cadastros; 
	}

	function getConta(){
		$stmt = $this->con->prepare("SELECT CodConta, NomeConta, SenhaConta, codCli FROM tbconta");
		$stmt->execute();
		$stmt->bind_result($CodConta, $NomeConta, $SenhaConta, $codCli);
		
		$cadastros = array(); 
		
		while($stmt->fetch()){
			$cadastro  = array();
			$cadastro['CodConta'] = $CodConta; 
			$cadastro['NomeConta'] = $NomeConta;
			$cadastro['SenhaConta'] = $SenhaConta;  
			$cadastro['codCli'] = $codCli; 

			
			array_push($cadastros, $cadastro); 
		}
		
		return $cadastros; 
	}

	function getUsuario(){
		$stmt = $this->con->prepare("SELECT codUsu, codCli, nomeUsu, senhaUsu FROM tbusuario");
		$stmt->execute();
		$stmt->bind_result($codUsu, $codCli, $nomeUsu, $senhaUsu);
		
		$cadastros = array(); 
		
		while($stmt->fetch()){
			$cadastro  = array();
			$cadastro['codUsu'] = $codUsu; 
			$cadastro['codCli'] = $codCli;
			$cadastro['nomeUsu'] = $nomeUsu;  
			$cadastro['senhaUsu'] = $senhaUsu; 

			
			array_push($cadastros, $cadastro); 
		}
		
		return $cadastros; 
	}
	
	function updateCadastroCli($codCli, $nomeCli, $CPFcli, $emailCli, $EndCli, $TelCli){
		$stmt = $this->con->prepare("UPDATE tbcadastrocli SET nome = ?, CPFcli = ?, emailCli = ?, EndCli = ?, TelCli = ?, WHERE codCli = ?");
		$stmt->bind_param("sisssi", $nomeCli, $CPFcli, $emailCli, $EndCli, $TelCli, $codCli);
		if($stmt->execute())
			return true; 
		return false; 
	}

	function updateCadastroLivro($codLivro, $nomeLivro, $IBSNlivro, $autor, $donoLivro){
		$stmt = $this->con->prepare("UPDATE tbcadastrolivros SET nomeLivro = ?, IBSNlivro = ?, autor = ?, donoLivro=? , WHERE codLivro = ?");
		$stmt->bind_param("sissi", $nomeLivro, $IBSNlivro, $autor, $donoLivro,  $codLivro);
		if($stmt->execute())
			return true; 
		return false; 
	}

	function updateConta($CodConta, $NomeConta, $SenhaConta, $codCli){
		$stmt = $this->con->prepare("UPDATE tbconta SET NomeConta = ?, SenhaConta = ?, codCli = ?, WHERE CodConta = ?");
		$stmt->bind_param("ssii", $nomeCli, $CPFcli, $emailCli, $EndCli, $TelCli, $codCli);
		if($stmt->execute())
			return true; 
		return false; 
	}

	function updateUsuario($codUsu, $codCli, $nomeUsu, $senhaUsu){
		$stmt = $this->con->prepare("UPDATE tbusuario SET codCli = ?, nomeUsu = ?, senhaUsu = ?, WHERE codUsu = ?");
		$stmt->bind_param("issi", $codCli, $nomeUsu, $senhaUsu, $codUsu);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deleteCadastroCli($codCli){
		$stmt = $this->con->prepare("DELETE FROM tbcadastrocli WHERE codCli = ? ");
		$stmt->bind_param("i", $codCli);
		if($stmt->execute())
			return true; 
		
		return false; 
	}

	function deleteCadastroLivro($codLivro){
		$stmt = $this->con->prepare("DELETE FROM tbcadastrolivros WHERE codLivro = ? ");
		$stmt->bind_param("i", $codCli);
		if($stmt->execute())
			return true; 
		
		return false; 
	}

	function deleteConta($CodConta){
		$stmt = $this->con->prepare("DELETE FROM tbconta WHERE CodConta = ? ");
		$stmt->bind_param("i", $codCli);
		if($stmt->execute())
			return true; 
		
		return false; 
	}

	function deleteUsuario($codUsu){
		$stmt = $this->con->prepare("DELETE FROM tbusuario WHERE codUsu = ? ");
		$stmt->bind_param("i", $codCli);
		if($stmt->execute())
			return true; 
		
		return false; 
	}
}