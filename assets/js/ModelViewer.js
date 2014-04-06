var viewBox;
var camera, scene, renderer, control, mainVein, stats, projector, Offset;
var veinPartsInScene = [];
var viewBoxWidth, viewBoxHeight;
var mouse = { x: 0, y: 0 }, INTERSECTED;



/* settings */
var aspectRatio = 1.7;
var folder = "../../../app_content/";
var msgNotSelected = "Not selected";
var showStats = false;
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
				// scene.add( new THREE.GridHelper( 500, 100 ) );

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
						veinPartsInScene[i].visible = false;

						scene.add( veinPartsInScene[i] );

					//	veinPartsInScene[i].material.emissive.setHex( 0x000000 );
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
				createVeinPartLinks(veinPartsInScene);
			}
		}

	function animate() {
		requestAnimationFrame( animate );
		if(control!=null) control.update();
		// render();
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



	$('#viewBox').mousemove(function(event){
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
						console.log(intersects);
						// if ( INTERSECTED ) INTERSECTED.material.emissive.setHex( INTERSECTED.currentHex );						
						INTERSECTED = intersects[ 0 ].object;
						console.log(INTERSECTED.name);

						if(INTERSECTED.name=="main_vein"){
							$('#infoBox').html(msgNotSelected);
							viewBox.style.cursor = 'auto';
						} else {
							$('#infoBox').html('<h4>'+veinParts[INTERSECTED.name].name+'</h4>'+veinParts[INTERSECTED.name].info);
							viewBox.style.cursor = 'help';
							setSameVeinPartsVisible(intersects[ 0 ].object.tag);
						}
						// INTERSECTED.currentHex = INTERSECTED.material.emissive.getHex();
						// INTERSECTED.material.emissive.setHex( 0xff0000 );
						INTERSECTED.visible = true;	
					} else {
						//je vybrate to co bolo pred tym
					}

				} else {					
					// if ( INTERSECTED ) INTERSECTED.material.emissive.setHex( INTERSECTED.currentHex );
					// INTERSECTED.visible = false;
					viewBox.style.cursor = 'auto';					
					INTERSECTED = null;
					$('#infoBox').html(msgNotSelected);
				}

		}
	});

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
			console.log(veinPartsInScene[i].visible);
					console.log(veinPartsInScene[i].tag + "=="+ selectedPartName);
					if(veinPartsInScene[i].tag==selectedPartName){
						veinPartsInScene[i].visible=true;	
					} else {
						veinPartsInScene[i].visible=false;						
					}
					
				};
			}			

			function createVeinPartLinks(orderedVeinParts){
				var links ="";
				var prevPartTag = ""; 			
				for (var i = orderedVeinParts.length - 1; i >= 0; i--) {
					if(prevPartTag!=orderedVeinParts[i].tag){
						links += '<a href="#" onClick="setSameVeinPartsVisible(\''+orderedVeinParts[i].tag+'\')" title="'+orderedVeinParts[i].tag+'">'+orderedVeinParts[i].tag+'</a>,';
					}
					prevPartTag=orderedVeinParts[i].tag;
				};
				console.log(links);
				$('#veinParts').html(links);
			}



////////////////////////////////////////////////





		// 	if ( ! Detector.webgl ) Detector.addGetWebGLMessage();

		// 	var container, stats;

		// 	var camera, scene, renderer, objects;
		// 	var particleLight, pointLight;
		// 	var dae, skin;

		// 	var clock = new THREE.Clock();
		// 	var morphs = [];

		// 	// Collada model

		// 	var loader = new THREE.ColladaLoader();
		// 	loader.options.convertUpAxis = true;
		// 	loader.load( 'models/collada/monster/monster.dae', function ( collada ) {

		// 		dae = collada.scene;
		// 		skin = collada.skins[ 0 ];

		// 		dae.scale.x = dae.scale.y = dae.scale.z = 0.002;
		// 		dae.position.x = -1;
		// 		dae.updateMatrix();

		// 		init();
		// 		animate();

		// 	} );

		// 	function init() {

		// 		container = document.createElement( 'div' );
		// 		document.body.appendChild( container );

		// 		camera = new THREE.PerspectiveCamera( 50, window.innerWidth / window.innerHeight, 1, 2000 );
		// 		camera.position.set( 2, 4, 5 );

		// 		scene = new THREE.Scene();
		// 		scene.fog = new THREE.FogExp2( 0x000000, 0.035 );

		// 		// Add Blender exported Collada model

		// 		var loader = new THREE.JSONLoader();
		// 		loader.load( 'models/animated/monster/monster.js', function ( geometry, materials ) {

		// 			// adjust color a bit

		// 			var material = materials[ 0 ];
		// 			material.morphTargets = true;
		// 			material.color.setHex( 0xffaaaa );
		// 			material.ambient.setHex( 0x222222 );

		// 			var faceMaterial = new THREE.MeshFaceMaterial( materials );

		// 			for ( var i = 0; i < 729; i ++ ) {

		// 				// random placement in a grid

		// 				var x = ( ( i % 27 )  - 13.5 ) * 2 + THREE.Math.randFloatSpread( 1 );
		// 				var z = ( Math.floor( i / 27 ) - 13.5 ) * 2 + THREE.Math.randFloatSpread( 1 );

		// 				// leave space for big monster

		// 				if ( Math.abs( x ) < 2 && Math.abs( z ) < 2 ) continue;

		// 				morph = new THREE.MorphAnimMesh( geometry, faceMaterial );

		// 				// one second duration

		// 				morph.duration = 1000;

		// 				// random animation offset

		// 				morph.time = 1000 * Math.random();

		// 				var s = THREE.Math.randFloat( 0.00075, 0.001 );
		// 				morph.scale.set( s, s, s );

		// 				morph.position.set( x, 0, z );
		// 				morph.rotation.y = THREE.Math.randFloat( -0.25, 0.25 );

		// 				morph.matrixAutoUpdate = false;
		// 				morph.updateMatrix();

		// 				scene.add( morph );

		// 				morphs.push( morph );

		// 			}

		// 		} );


		// 		// Add the COLLADA

		// 		scene.add( dae );

		// 		// Lights

		// 		scene.add( new THREE.AmbientLight( 0xcccccc ) );

		// 		pointLight = new THREE.PointLight( 0xff4400, 5, 30 );
		// 		pointLight.position.set( 5, 0, 0 );
		// 		scene.add( pointLight );

		// 		// Renderer

		// 		renderer = new THREE.WebGLRenderer();
		// 		renderer.setSize( window.innerWidth, window.innerHeight );

		// 		container.appendChild( renderer.domElement );

		// 		// Stats

		// 		stats = new Stats();
		// 		container.appendChild( stats.domElement );

		// 		// Events

		// 		window.addEventListener( 'resize', onWindowResize, false );

		// 	}

		// 	//

		// 	function onWindowResize( event ) {

		// 		renderer.setSize( window.innerWidth, window.innerHeight );

		// 		camera.aspect = window.innerWidth / window.innerHeight;
		// 		camera.updateProjectionMatrix();

		// 	}

		// 	//

		// 	var t = 0;
		// 	function animate() {

		// 		requestAnimationFrame( animate );

		// 		// animate Collada model

		// 		if ( t > 30 ) t = 0;

		// 		if ( skin ) {

		// 			// guess this can be done smarter...

		// 			// (Indeed, there are way more frames than needed and interpolation is not used at all
		// 			//  could be something like - one morph per each skinning pose keyframe, or even less,
		// 			//  animation could be resampled, morphing interpolation handles sparse keyframes quite well.
		// 			//  Simple animation cycles like this look ok with 10-15 frames instead of 100 ;)

		// 			for ( var i = 0; i < skin.morphTargetInfluences.length; i++ ) {

		// 				skin.morphTargetInfluences[ i ] = 0;

		// 			}

		// 			skin.morphTargetInfluences[ Math.floor( t ) ] = 1;

		// 			t += 0.5;

		// 		}

		// 		// animate morphs

		// 		var delta = clock.getDelta();

		// 		if ( morphs.length ) {

		// 			for ( var i = 0; i < morphs.length; i ++ )
		// 				morphs[ i ].updateAnimation( 1000 * delta );


		// 		}

		// 		render();
		// 		stats.update();

		// 	}

		// 	function render() {

		// 		var timer = Date.now() * 0.0005;

		// 		camera.position.x = Math.cos( timer ) * 10;
		// 		camera.position.y = 4;
		// 		camera.position.z = Math.sin( timer ) * 10;

		// 		camera.lookAt( scene.position );

		// 		renderer.render( scene, camera );

		// 	}

		// 