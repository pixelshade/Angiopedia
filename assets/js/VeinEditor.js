
var camera, scene, renderer, control, viewBox, mainVein, activePart;
var viewBoxWidth, viewBoxHeight;
var aspectRatio = 1.7;
var folder = "../../../app_content/";

init();
render();

function init() {
				activePart = null;


				//set up width
				viewBoxWidth = $("#viewBox").width();
				viewBoxHeight = viewBoxWidth / aspectRatio;



				renderer = new THREE.WebGLRenderer();
				renderer.sortObjects = false;
				renderer.setSize( viewBoxWidth, viewBoxHeight );
				renderer.setClearColor( 0xffffff, 1 );
				viewBox = document.getElementById("viewBox");

				viewBox.appendChild( renderer.domElement );

				camera = new THREE.PerspectiveCamera( 60, viewBoxWidth / viewBoxHeight, 1, 5000 );
				camera.position.set( 0, 0, 200 );
							

				scene = new THREE.Scene();
				scene.add( new THREE.GridHelper( 500, 100 ) );

				setUpLightning();

				loadParts();
				if(isEditingVein){
					loadModel(veinJson.model, function(loadedMesh){
					updateActiveModelWithFields(loadedMesh);	
					activePart = loadedMesh;					
					addControls(loadedMesh);	
				});				
				} 



			

			window.addEventListener( 'resize', onWindowResize, false );
			


		}

		function onWindowResize() {			
			//set up width
			viewBoxWidth = $("#viewBox").width();
			viewBoxHeight = viewBoxWidth / aspectRatio;
			renderer.setSize( viewBoxWidth, viewBoxHeight );
			camera.aspect = viewBoxWidth / viewBoxHeight;
			camera.updateProjectionMatrix();
			renderer.setSize( viewBoxWidth, viewBoxHeight );
			render();
		}

		function render() {
				
			if(activePart!=null){		
				control.update();
				updateFieldsWithActualItemData(activePart);				
			}
			renderer.render( scene, camera );
		}


		function addControls(toModel) {			
			control = new THREE.TransformControls( camera, renderer.domElement );			
			control.addEventListener( 'change', render );
			control.attach( toModel );

			console.log(toModel);
			scene.add( control );	

			window.addEventListener( 'keydown', function ( event ) {				
		            //console.log(event.which);
		            switch ( event.keyCode ) {
		              case 81: // Q
		              control.setSpace( control.space == "local" ? "world" : "local" );
		              break;
		              case 87: // W
		              control.setMode( "translate" );
		              break;
		              case 69: // E
		              control.setMode( "rotate" );
		              break;
		              case 82: // R
		              control.setMode( "scale" );
		              break;
		              case 187:
					case 107: // +,=,num+
					control.setSize( control.size + 0.1 );
					break;
					case 189:
					case 109:
					case 10: // -,_,num-
					control.setSize( Math.max(control.size - 0.1, 0.1 ) );
					break;
				}            
			});        		
		}

		function removeControls(){
			scene.remove(control);				
		}


		function setUpLightning(){
			var light = new THREE.DirectionalLight( 0xffffff, 2 );
			light.position.set( 1, 1, 1 );
			scene.add( light );

			// var directionalLight = new THREE.DirectionalLight(0xffffff);
			// directionalLight.position.set(0, -1000, 1000).normalize();
			// scene.add(directionalLight);	

			// var directionalLight2 = new THREE.DirectionalLight(0xffffff);
			// directionalLight2.position.set(-1000,-1000, -1000).normalize();
			// scene.add(directionalLight2);						

			// var directionalLight3 = new THREE.DirectionalLight(0xffffff);
			// directionalLight3.position.set(1000,1000, 1000).normalize();
			// scene.add(directionalLight3);

			// var directionalLight4 = new THREE.DirectionalLight(0xffffff);
			// directionalLight4.position.set(-1000,1000, -1000).normalize();
			// scene.add(directionalLight4);
		}


		function updateFieldsWithActualItemData(activeModel){
			$('[name="position_x"]').val(activeModel.position.x);
			$('[name="position_y"]').val(activeModel.position.y);
			$('[name="position_z"]').val(activeModel.position.z);
			$('[name="scale_x"]').val(activeModel.scale.x);
			$('[name="scale_y"]').val(activeModel.scale.y);
			$('[name="scale_z"]').val(activeModel.scale.z);
			$('[name="rotation_x"]').val(activeModel.rotation.x);
			$('[name="rotation_y"]').val(activeModel.rotation.y);
			$('[name="rotation_z"]').val(activeModel.rotation.z);
		}


	function updateActiveModelWithFields(activeModel){
			activeModel.position.x = $('[name="position_x"]').val();
			activeModel.position.y = $('[name="position_y"]').val();
			activeModel.position.z = $('[name="position_z"]').val();
			activeModel.scale.x = $('[name="scale_x"]').val();
			activeModel.scale.y = $('[name="scale_y"]').val();
			activeModel.scale.z = $('[name="scale_z"]').val();
			activeModel.rotation.x = $('[name="rotation_x"]').val();
			activeModel.rotation.y = $('[name="rotation_y"]').val();
			activeModel.rotation.z = $('[name="rotation_z"]').val();
		}


		function loadModel(modelName, modelLoadedCallback ){
			if(modelName!=""){
				var loader = new THREE.JSONLoader();

				console.log("loading "+ folder+modelName);
				loader.load( folder+modelName, function ( geometry ) {

				geometry.computeVertexNormals();				
				// new THREE.MeshLambertMaterial( {color: 0xCC0000, shading: THREE.FlatShading, overdraw: true}) 				
				material = new THREE.MeshNormalMaterial( {color: 0x66CCFF });
				mesh = new THREE.Mesh( geometry, material ); 				
		 		mesh.name="vein";
		 		
		 		scene.add( mesh );		 		 		
		 		modelLoadedCallback(mesh);
				render();
		 	} );
			

			// 	var texture = THREE.ImageUtils.loadTexture( 'textures/crate.gif', new THREE.UVMapping(), render );
			// texture.anisotropy = renderer.getMaxAnisotropy();

		
			// var material = new THREE.MeshLambertMaterial( { map: texture } );

			

			// mainVein = new THREE.Mesh( geometry, material );
			// scene.add( mainVein );

			
			// activePart = mainVein;
			// addControls(activePart);
			
			// camera.lookAt(activePart.position)		;
			}
		}


		function setModelWithJsonParams(model,jsonParams){
			console.log(model);
			console.log(jsonParams);
			if(model!=null){
				model.position.x = jsonParams.position_x;
				model.position.y = jsonParams.position_y;
				model.position.z = jsonParams.position_z;

				model.scale.x = jsonParams.scale_x;
				model.scale.y = jsonParams.scale_y;
				model.scale.z = jsonParams.scale_z;

				model.rotation.x = jsonParams.rotation_x;
				model.rotation.y = jsonParams.rotation_y;
				model.rotation.z = jsonParams.rotation_z;
			}
		}


		function loadParts(){
			// 	if(veinParts!=null){


			// 		for (var i = veinParts.length - 1; i >= 0; i--) {
			// 			switch(veinParts[i].objType){
			// 				case "cube":
			// 				geometry = new THREE.CubeGeometry( 30, 30, 30, 2, 2, 2 );
			// 				break;
			// 				case "sphere":
			// 				geometry = new THREE.SphereGeometry( 30, 16, 16);
			// 				break;
			// 				case "plane":
			// 				geometry = new THREE.PlaneGeometry( 50, 50, 8, 8 );
			// 				break;
			// 			}

			// 			material = new THREE.MeshBasicMaterial({color:0x389CD1, transparent: true, opacity: 0.8});//THREE.MeshLambertMaterial( {color: 0x389CD1});// new THREE.MeshNormalMaterial();						

			// 			veinPartsInScene[i]= new THREE.Mesh(geometry,material);					
			// 			veinPartsInScene[i].visible = false;

			// 			scene.add( veinPartsInScene[i] );

			// 		//	veinPartsInScene[i].material.emissive.setHex( 0x000000 );
			// 		veinPartsInScene[i].position.x=veinParts[i].x;
			// 		veinPartsInScene[i].position.y=veinParts[i].y;
			// 		veinPartsInScene[i].position.z=veinParts[i].z;
			// 		veinPartsInScene[i].scale.x=veinParts[i].scaleX/100;
			// 		veinPartsInScene[i].scale.y=veinParts[i].scaleY/100;
			// 		veinPartsInScene[i].scale.z=veinParts[i].scaleZ/100;
			// 		veinPartsInScene[i].rotation.x=veinParts[i].rotationX*(Math.PI/180);
			// 		veinPartsInScene[i].rotation.y=veinParts[i].rotationY*(Math.PI/180);
			// 		veinPartsInScene[i].rotation.z=veinParts[i].rotationZ*(Math.PI/180);
			// 		veinPartsInScene[i].name=i;
			// 		veinPartsInScene[i].tag=veinParts[i].vein_part_name;						
			// 	}	
			// 	merge_same_vein_parts(veinPartsInScene);
			// 	createBonePartLinks(veinPartsInScene);
			// }
		}

		function updateModel(){
			var selected = $('[name="model"]').val();
			scene.remove(activePart);
			removeControls();					
			loadModel(selected,function(loadedMesh){
				activePart = loadedMesh;
				addControls(loadedMesh);
			});			
			render()
		}

		
		$('[name="model"]').on('change',updateModel);


