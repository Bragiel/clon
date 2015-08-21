<?php
	include 'db.php';
	include 'filterSetup.php';

	function lvlone($results){
		//lvlone
		foreach($results as $key => $value){
			$categorias[$results[$key][0]] = array(
			);
		}
		return $categorias;
	}

	function lvltwo($results, $categorias){
		//lvltwo
		foreach($results as $key => $value){
			foreach($categorias as $categoria => $datosCategoria){
				if($categoria == $results[$key][0]){
					$categorias[$categoria]['lvltwo'][$results[$key][1]] = array(
						    $results[$key][1] => $results[$key][1],
						    "module" => $results[$key]['Clave']
					);
				}
			}
		}

		return $categorias;
	}

	function orderArray($results){

		$categorias = lvlone($results);
		$categorias = lvltwo($results, $categorias);

		return $categorias;
	}

	function constructor($lvlone){
		$html = '<ul id="menu_list" class="dropdown">';

		foreach ($lvlone as $onekey => $onevalue){
			$html.= '<li>';
			$html.=		'<label>'.$onekey.'</label>';
			$html.=		'<ul>';
			foreach($onevalue["lvltwo"] as $twokey => $twovalue){
				$html.= '<li class="option"><label href="" data-module="'.$twovalue['module'].'">'.$twokey.'</label></li>';
			}
			$html .='</ul>'	;
			$html .= '</li>';

		}

		$html.= '</ul>';

		return $html;

	}

	if(isset($_POST['business'])){
		$param = $_POST['business'];
		//Este query usa siempre 'COSYSA' como base de datos.
		$db = $param['db'];

		connectDB($db);

		$qry = "EXEC spSalBDEmpresaNombre";
		$options = run($qry);
		foreach ($options as $key) {
			$option_list[] = "<option value='".$key["BD"]."' data-business='".$key["Empresa"]."'>".$key["Nombre"]."</option>";

		}

		$response = array(
			'html' => $option_list,
		);

		echo json_encode($response);
	}

	if(isset($_POST['branch'])){
		$param = $_POST['branch'];
		$db = $param['db'];

		connectDB($db);

		$qry = "SELECT Sucursal, Nombre FROM SUCURSAL";
		$options = run($qry);
		$option_list[] = "<option value='' data-business=''></option>";
		foreach ($options as $key) {
			$option_list[] = "<option value='".$key["Nombre"]."'>".$key["Nombre"]."</option>";

		}

		$response = array(
			'html' => $option_list,
		);


		echo json_encode($response);
	}

	if(isset($_POST['login'])){
		$param = $_POST['login'];
		$db=$param['db'];
		$usr=$param['usr'];
		$pass=$param['pass'];
		$business = $param['business'];
		$branch = $param['branch'];

		$conn = connectDB($db);

		$pass=md5(strtoupper($pass));
		$pass=md5('KnTZyc0MBadRkAA'.strtolower($pass).'0skkrlFuO/i');

		$qry="SELECT Nombre, GrupoTrabajo, Usuario FROM Usuario WHERE Usuario='$usr' AND Contrasena='$pass'";

		$aut=run($qry);


		if($aut){

			$qry="EXEC dbo.spSalAccesoUsr '".$usr."'";

			$menu_list = run($qry);
			$menu_list = orderArray($menu_list);
			$menu_list = constructor($menu_list);


			session_start();
			$_SESSION["log"]=true;
			$_SESSION["usrname"]=$usr;
			$_SESSION["name"]=$aut[0]['Nombre'];
			$_SESSION['branch']=$branch;
			$_SESSION["business"]=$business;
			$_SESSION["html"]=$menu_list;
			$_SESSION["db"]=$db;

			$response=array(
				'error'=>'no',
				'workgroup'=>$aut[0]['GrupoTrabajo'],
				'usrname'=>strtoupper($usr),
				'name'=>$aut[0]['Nombre']
			);


		}else{
			$response=array(
				'error'=>'si',
				'console' => $qry
			);
		}


		echo json_encode($response);
	}// END login


	if(isset($_POST['movements'])){
		$x = $_POST['movements'];
		$db = $x['db'];
		$usrname = $x['usrname'];
		$module = $x['module'];

		connectDB($db);

		$qry="SELECT Mov FROM dbo.fn_SalMovsUsr('$usrname','$module')";

		$movs=run($qry, MSSQL_NUM);

		$mov_options[] = "<option value='(Todos)'>Todos</option>";
		$filters = "";

		foreach ($movs as $mov) {
			foreach ($mov as $value) {
				$value = utf8_encode($value);
				$mov_options[] = "<option value='".$value."'>".$value."</option>";
				$filters .= "'".$value."',";
			}
		}

		$filters = substr_replace($filters ,"",-1);

		$qry="SELECT Proyecto FROM Proy ";

		$movs=run($qry, MSSQL_NUM);

		$project_options[] = "<option value='(Todos)'>Todos</option>";

		foreach ($movs as $mov) {
			foreach ($mov as $value) {
				$value = utf8_encode($value);
				$project_options[] = "<option value='".$value."'>".$value."</option>";
			}

		}

		$qry="SELECT Usuario FROM Usuario";

		$movs=run($qry, MSSQL_NUM);

		$user_options[] = "<option value='(Todos)'>Todos</option>";

		foreach ($movs as $mov) {
			foreach ($mov as $value) {
				$value = utf8_encode($value);
				$user_options[] = "<option value='".$value."'>".$value."</option>";
			}

		}

		switch ($module) {
			case 'GAS':

				$qry = introFilter('GAS', $filters);
				$documents=run($qry, 'ASSOC');
				$filter_results = tableConstructor('GAS', $documents);

			break;

			case 'COMS':

				$qry = introFilter('COMS', $filters);
				$documents=run($qry, 'ASSOC');
				$filter_results = tableConstructor('COMS', $documents);

			break;

			case 'DIN':

				$qry = introFilter('DIN', $filters);
				$documents=run($qry, 'ASSOC');
				$filter_results = tableConstructor('DIN', $documents);

			break;

			case 'CXP':

				$qry = introFilter('CXP', $filters);
				$documents=run($qry, 'ASSOC');
				$filter_results = tableConstructor('CXP', $documents);

			break;

		}

		$response=array(

				'mov_options' => $mov_options,
				'project_options' => $project_options,
				'user_options'=> $user_options,
				'documents' => $filter_results,
				'doc_array' => $documents
			);

		echo json_encode($response);

	}


	if(isset($_POST['filter_data'])){
		$x = $_POST['filter_data'];
		$db = $x['db'];
		$search = $x['search'];
		$mov_type = $x['mov_type'];
		$status = $x['status'];
		$date = $x['date'];
		$user = $x['user'];
		$branch = $x['branch'];
		$project = $x['project'];
		$module = $x['module'];
		$business = $x['business'];

		$date_range_values = convertDate($date);



		connectDB($db);

		switch ($module) {
			case 'GAS':

				$filter = filterSetup($search, $mov_type, $status, $user, $branch, $project, $module, $business, $date, $date_range_values);
				$qry = searchQry('GAS', $filter);
				$documents=run($qry, 'ASSOC');
 				$filter_results = tableConstructor('GAS', $documents);

			break;

			case 'COMS':

				$filter = filterSetup($search, $mov_type, $status, $user, $branch, $project, $module, $business, $date, $date_range_values);
				$qry = searchQry('COMS', $filter);
				$documents=run($qry, 'ASSOC');
 				$filter_results = tableConstructor('COMS', $documents);

			break;

			case 'DIN':

				$filter = filterSetup($search, $mov_type, $status, $user, $branch, $project, $module, $business, $date, $date_range_values);
				$qry = searchQry('DIN', $filter);
				$documents=run($qry, 'ASSOC');
				$filter_results = tableConstructor('DIN', $documents);

			break;

			case 'CXP':

				$filter = filterSetup($search, $mov_type, $status, $user, $branch, $project, $module, $business, $date, $date_range_values);
				$qry = searchQry('CXP', $filter);
 				$documents=run($qry, 'ASSOC');
				$filter_results = tableConstructor('CXP', $documents);

			break;
		}

		$response=array(
				'qry' => $qry,
				'documents' => $filter_results,
				'doc_array' => $documents
			);

		echo json_encode($response);
	}//END $_POST['filter_data']


?>
