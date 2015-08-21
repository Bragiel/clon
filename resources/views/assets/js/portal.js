$(function(){
	var body = $('body'),
		wrapper = body.find('#wrapper');

	body.on('change','input[name=user]',function(){
		var business = body.find('select[name=business]');
			params = {'db':'pruebasCOSYSA'};

		$.post('assets/controllers/functions.php', {business:params}, function(response){

			business.removeAttr('disabled');
			business.append(response.html);
		}, 'json');

	});

	body.on('change','select[name=business]',function(){
		var branch = body.find('select[name=branch]');
			params = {'db':$(this).val()};


		$.post('assets/controllers/functions.php', {branch:params}, function(response){
			console.log(response);
			branch.removeAttr('disabled');
			branch.find('option').remove();
			branch.append(response.html);
		}, 'json');

	});

	body.on('click','input[name=login]',function(){
		var d = document.login,
			usr = body.find('input[name=user]').val(),
			pass = body.find('input[name=pass]').val(),
			errorMsg = body.find(".errorMsg"),
			db = body.find('select[name=business]').val(),
			business = body.find('select[name=business] option:selected').data('business'),
			business_name = body.find('select[name=business] option:selected').text(),
			branch = body.find('select[name=branch]').val(),
			login = body.find('#login'),
			params ={
			'usr':usr,
			'pass':pass,
			'db':db,
			'business':business,
			'branch':branch};




		$.post('assets/controllers/functions.php', {login:params}, function(response){

			if(response.error=='no'){
				d.db.value = db;
				// d.usrname.value = response.usrname;
				d.business.value = business;
				d.branch.value = branch;
				d.submit();

			}else{
				if(errorMsg){
					errorMsg.remove();
					login.append('<span class="errorMsg">Su usuario/contraseña no es correcto.</span>');
				}else{
					login.append('<span class="errorMsg">Su usuario/contraseña no es correcto.</span>');
				}
			}

		}, 'json');

	});



	body.on('click','label',function(){
		var $this = $(this),
			module = $this.data('module'),
			usrname = body.find('input[name=usrname]').val(),
			db = body.find('input[name=db]').val(),
			params = {
				'db':db,
				'module':module,
				'usrname':usrname
			};
			console.log(params);

		if(module){

			if(module=='SALIR'){
				window.location = "logout.php"
			}

			$.post('assets/controllers/functions.php', {movements:params}, function(response){


				var nav_bar = body.find('#nav_bar'),
					control_panel = body.find('#control_panel'),
					select_mov = body.find('select[name=mov]'),
					select_project = body.find('select[name=project]'),
					select_user = body.find('select[name=user]'),
					filter_btn = body.find('input[name=control_filter]'),
					control_panel_results = body.find('#control_panel_results');


				control_panel.fadeIn();

				filter_btn.data('module', module);

				select_mov.find('option').remove();
				select_mov.append(response.mov_options);

				select_project.find('option').remove();
				select_project.append(response.project_options);

				select_user.find('option').remove();
				select_user.append(response.user_options);

				control_panel_results.find('div').remove();
				control_panel_results.append(response.documents);

			}, 'json');
		}

	});

	body.on('click','input[name=control_filter]',function(){
		var $this = $(this),
			search = body.find('input[name=search]').val(),
			mov_type = body.find('select[name=mov]').val(),
			status = body.find('select[name=status]').val(),
			date = body.find('select[name=date]').val(),
			user = body.find('select[name=user]').val(),
			branch = body.find('select[name=branch]').val(),
			db = body.find('input[name=db]').val(),
			business = body.find('input[name=business]').val(),
			project = body.find('select[name=project]').val();

			params = {
				'search':'%'+search+'%',
				'mov_type':mov_type,
				'status':status,
				'date':date,
				'user':user,
				'branch':branch,
				'project':project,
				'db':db,
				'module':$this.data('module'),
				'business':business
			}
			console.log(params);

			$this.attr('disabled', 'true');
			$this.val('procesando');

		$.post('assets/controllers/functions.php', {filter_data:params}, function(response){
			var control_panel = body.find('#control_panel'),
				select_mov = body.find('select[name=mov]'),
				select_project = body.find('select[name=project]'),
				select_user = body.find('select[name=user]'),
				filter_btn = body.find('input[name=control_filter]'),
				control_panel_results = body.find('#control_panel_results');

			console.log(response);

			$this.removeAttr('disabled');
			$this.val('filtrar');

			control_panel.fadeIn();

			control_panel_results.find('div').remove();
			control_panel_results.append(response.documents);

		}, 'json');

	});

	body.on('click','#back_btn',function(){
		window.location = "portal.php";
	});

});
