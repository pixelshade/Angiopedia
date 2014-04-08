var viewBox;
var camera, scene, renderer, control, mainVein, stats, projector, Offset;
var veinPartsInScene = new Array();
var viewBoxWidth, viewBoxHeight;
var mouse = { x: 0, y: 0 }, INTERSECTED;

var popoverWidth = $("#popover").width();
var popoverHeight = $("#popover").height();
var correctlyTagged = new Array();
var allTagNames = new Array();
var actualProgress = 0;


/* settings */
var aspectRatio = 1.7;
var folder = "../../../app_content/";
var msgNotSelected = "";//"Not selected";
var showStats = false;
var showGrid = false;
var mouseIntersectDetectionEnabled = true;

init();
animate();

function init() {

				Offset = $('#viewBox').offset(); 
				//set up width
				viewBoxWidth = $("#viewBox").width();
				viewBoxHeight = window.innerHeight-200;// viewBoxWidth / aspectRatio;

				projector = new THREE.Projector();

				renderer = new THREE.WebGLRenderer();
				renderer.setClearColor( 0xffffff, 1 );
				renderer.sortObjects = false;
				renderer.setSize( viewBoxWidth, viewBoxHeight );
				viewBox = document.getElementById("viewBox");

				viewBox.appendChild( renderer.domElement );

				camera = new THREE.PerspectiveCamera( 60, viewBoxWidth / viewBoxHeight, 1, 5000 );
				camera.position.set( 0, 0, 200 );
							

				scene = new THREE.Scene();
				if(showGrid) scene.add( new THREE.GridHelper( 500, 100 ) );

				setUpLightning();
				loadParts(veinPartsJson);
				loadModel(veinJson.model);
				if(showStats){
					addStats();
				}
			// var texture = THREE.ImageUtils.loadTexture( 'textures/crate.gif', new THREE.UVMapping(), render );
			// texture.anisotropy = renderer.getMaxAnisotropy();

			// var geometry = new THREE.BoxGeometry( 200, 200, 200 );
			// var material = new THREE.MeshLambertMaterial( { map: texture } );

			// control = new THREE.TransformControls( camera, renderer.domElement );

			// control.addEventListener( 'change', render );

			// mesh = new THREE.Mesh( geometry, material );
			// scene.add( mesh );

			// control.attach( mesh );
			// scene.add( control );

			window.addEventListener( 'resize', onWindowResize, false );	


		}

		function onWindowResize() {
			control.handleResize();
			Offset = $('#viewBox').offset();
//set up width
			viewBoxWidth = $("#viewBox").width();
			viewBoxHeight = viewBoxWidth / aspectRatio;
			renderer.setSize( viewBoxWidth, viewBoxHeight );
			camera.aspect = viewBoxWidth / viewBoxHeight;
			camera.updateProjectionMatrix();

			renderer.setSize( viewBoxWidth, viewBoxHeight );

			render();

		}

			function animate() {
				requestAnimationFrame( animate );
				if(control!=null) control.update();
				console.log("yolo");
			}


		function render() {

			renderer.render( scene, camera );

		}

		function loadModel(modelName){
			if(modelName!=""){
				var loader = new THREE.JSONLoader();

				console.log("loading "+ folder+modelName);
				loader.load( folder+modelName, function ( geometry ) {

				geometry.computeVertexNormals();
				// material = new THREE.MeshLambertMaterial( {color: 0xCC0000, shading: THREE.FlatShading, overdraw: true}) ;					
				material = new THREE.MeshNormalMaterial( {color: 0x66CCFF , shading: THREE.SmoothShading});
				mainVein = new THREE.Mesh( geometry, material ); 
				
				
		 		mainVein.name="main_vein";
		 		scene.add( mainVein );		 	
		 		activePart = mainVein;

				setModelWithJsonParams(mainVein, veinJson);			
		 		// addControls(mainVein);	
		 		addTrackballControls(activePart ,viewBox);
		 		
		 		render();
		 		
			
		 	} );				
		
			}
		}

		function addTrackballControls(model, domElement){
			control = new THREE.TrackballControls( camera, domElement );

				control.rotateSpeed = 1.0;
				control.zoomSpeed = 1.2;
				control.panSpeed = 0.8;

				control.noZoom = false;
				control.noPan = false;

				control.staticMoving = true;
				control.dynamicDampingFactor = 0.3;

				control.keys = [ 65, 83, 68 ];

				control.addEventListener( 'change', render );
		}


		function addControls(model) {
		 	control = new THREE.TransformControls( camera, renderer.domElement );
		 	control.addEventListener( 'change', render );			
		 	control.attach( model );
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


		function setUpLightning(){
			var light = new THREE.DirectionalLight( 0xffffff, 2 );
			light.position.set( 1, 1, 1 );
			scene.add( light );

			var directionalLight = new THREE.DirectionalLight(0xffffff);
			directionalLight.position.set(0, -1000, 1000).normalize();
			scene.add(directionalLight);	

			var directionalLight2 = new THREE.DirectionalLight(0xffffff);
			directionalLight2.position.set(-1000,-1000, -1000).normalize();
			scene.add(directionalLight2);						

			var directionalLight3 = new THREE.DirectionalLight(0xffffff);
			directionalLight3.position.set(1000,1000, 1000).normalize();
			scene.add(directionalLight3);

			var directionalLight4 = new THREE.DirectionalLight(0xffffff);
			directionalLight4.position.set(-1000,1000, -1000).normalize();
			scene.add(directionalLight4);
		}

		function setModelWithJsonParams(model,jsonParams){
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


	function loadParts(jsonArray){
				veinParts = jsonArray;
				if(veinParts!=null){
					for (var i = veinParts.length - 1; i >= 0; i--) {				
						geometry = new THREE.SphereGeometry( 30, 16, 16);					

						material = new THREE.MeshBasicMaterial({color:0xff99D1, transparent: true, opacity: 0.8});//THREE.MeshLambertMaterial( {color: 0x389CD1});// new THREE.MeshNormalMaterial();						

						veinPartsInScene[i]= new THREE.Mesh(geometry,material);					

						scene.add( veinPartsInScene[i] );
						veinPartsInScene[i].visible = false;
					
					veinPartsInScene[i].position.x=veinParts[i].position_x;
					veinPartsInScene[i].position.y=veinParts[i].position_y;
					veinPartsInScene[i].position.z=veinParts[i].position_z;
					veinPartsInScene[i].scale.x=veinParts[i].scale_x;
					veinPartsInScene[i].scale.y=veinParts[i].scale_y;
					veinPartsInScene[i].scale.z=veinParts[i].scale_z;
					veinPartsInScene[i].rotation.x=veinParts[i].rotation_x;
					veinPartsInScene[i].rotation.y=veinParts[i].rotation_y;
					veinPartsInScene[i].rotation.z=veinParts[i].rotation_z;
					veinPartsInScene[i].name=i;
					veinPartsInScene[i].tag=veinParts[i].name;	
				}	
				merge_same_vein_parts(veinPartsInScene);
				setAllDifferentPartNames(veinPartsInScene);
			}
		}

	function animate() {
		requestAnimationFrame( animate );
		if(control!=null) control.update();
		render();
	}

	function render() {
		if(showStats) stats.update();
		renderer.render( scene, camera );
	}

	function  addStats () {
		stats = new Stats();
		stats.domElement.style.position = 'absolute';
		stats.domElement.style.top = '70px';
		stats.domElement.style.zIndex = 100;
		viewBox.appendChild( stats.domElement );

	}














	$('#viewBox').click(function(event){
		if(mouseIntersectDetectionEnabled){
				// event.preventDefault();	

				mouse.x =  ( (event.pageX-Offset.left) / viewBoxWidth ) * 2 - 1;
				mouse.y = - ( (event.pageY-Offset.top) / viewBoxHeight ) * 2 + 1;

				var vector = new THREE.Vector3( mouse.x, mouse.y, 1 );
				projector.unprojectVector( vector, camera );
				
				var raycaster = new THREE.Raycaster( camera.position, vector.sub( camera.position ).normalize() );

				var intersects = raycaster.intersectObjects( veinPartsInScene );
				if ( (intersects.length > 0)) {
					if ( INTERSECTED != intersects[ 0 ].object) {						
						
						INTERSECTED = intersects[ 0 ].object;																	
						setSameVeinPartsVisible(intersects[ 0 ].object.tag);	
						
						$('#popover').css('left', event.pageX+'px');
      					$('#popover').css('top', event.pageY-(popoverHeight/2)+'px');		
      					$('#popover').show();			
						
					} else {
						//je vybrate to co bolo pred tym
					}

				} else {										
					$('#popover').hide();						
					INTERSECTED = null;
					setSameVeinPartsVisible("none");					
				}

		}
	});


$("#userTagName").change(function(event){
	var enteredName = event.target.value;
	actualName = veinParts[INTERSECTED.name].name;
	if(checkCorrectName(actualName)){
		correctlyTagged.push(actualName);		
		alert('good job!');
		$("#popover").hide();
		$("#userTagName").val('');
		actualProgress = (correctlyTagged.length/allTagNames.length*100);
		var progressBar = $('#progressBar');
	    progressBar.css( "width", actualProgress+"%");
	    progressBar.text(actualProgress +"%");
	} else {
	}
	createVeinPartLinks(correctlyTagged);
})

			function merge_same_vein_parts(parts){					
				function compare(a,b){					
					return a.tag.localeCompare(b.tag);
				}				
				parts.sort(compare);
				var prevPartTag = ""; 												 	
				for (var i = parts.length - 1; i >= 0; i--) {				
					if(prevPartTag==parts[i].tag){											
					 	THREE.GeometryUtils.merge(parts[i].geometry, parts[i+1].geometry);					 	
					}									 	
					prevPartTag=parts[i].tag;
				}				
			};

			function setSameVeinPartsVisible(selectedPartName){		
				for (var i = veinPartsInScene.length - 1; i >= 0; i--) {	
					if(veinPartsInScene[i].tag==selectedPartName){
						veinPartsInScene[i].visible=true;							
					} else {
						veinPartsInScene[i].visible=false;						
					}
				};
				render();
			}		

			function setAllDifferentPartNames(parts)	{
				function compare(a,b){					
					return a.tag.localeCompare(b.tag);
				}				
				parts.sort(compare);
				var prevPartTag = ""; 	
				for (var i = parts.length - 1; i >= 0; i--) {				
					if(prevPartTag==parts[i].tag){											
					 	THREE.GeometryUtils.merge(parts[i].geometry, parts[i+1].geometry);					 	
					} else {
						allTagNames.push(parts[i].tag);	
					}									 	
					prevPartTag=parts[i].tag;					
				}				
			}

			function createVeinPartLinks(parts){
				var links ="";
				var prevPartTag = ""; 			
				for (var i = parts.length - 1; i >= 0; i--) {
					if(prevPartTag!=parts[i]){
						links += '<a href="#" onClick="setSameVeinPartsVisible(\''+parts[i]+'\')" title="'+parts[i]+'">'+parts[i]+'</a>,';
					}
					prevPartTag=parts[i].tag;
				};
				console.log(links);
				$('#veinParts').html(links);
			}

			function checkCorrectName(actualName){
				return ($('#userTagName').val() == actualName);
			}
			










