
var camera, scene, renderer, control, viewBox, mainVein;
var viewBoxWidth, viewBoxHeight;
var aspectRatio = 1.7;
var folder = "../../../app_content/";

init();
render();

function init() {
	


				//set up width
				viewBoxWidth = $("#viewBox").width();
				viewBoxHeight = viewBoxWidth / aspectRatio;



				renderer = new THREE.WebGLRenderer();
				renderer.setClearColor( 0xffffff, 1 );
				renderer.sortObjects = false;
				renderer.setSize( viewBoxWidth, viewBoxHeight );
				viewBox = document.getElementById("viewBox");

				viewBox.appendChild( renderer.domElement );

				camera = new THREE.PerspectiveCamera( 70, viewBoxWidth / viewBoxHeight, 1, 5000 );
				camera.position.set( 0, 0, 200 );
				camera.lookAt( new THREE.Vector3( 0, 0, 0 ) );

				scene = new THREE.Scene();
				// scene.add( new THREE.GridHelper( 500, 100 ) );

				setUpLightning();

				loadModel(veinJson.model);

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
				if(control!=null) control.update();

			renderer.render( scene, camera );

		}

		function loadModel(modelName){
			if(modelName!=""){
				var loader = new THREE.JSONLoader();

				console.log("loading "+ folder+modelName);
				loader.load( folder+modelName, function ( geometry ) {

				geometry.computeVertexNormals();
				material = new THREE.MeshLambertMaterial( {color: 0xCC0000, shading: THREE.FlatShading, overdraw: true}) ;	//new THREE.MeshNormalMaterial( {color: 0x66CCFF , shading: THREE.SmoothShading});
				material = new THREE.MeshNormalMaterial( {color: 0x66CCFF });
				mainVein = new THREE.Mesh( geometry, material ); 
				// 			
				// mainVein = new THREE.Mesh( geom, new THREE.MeshLambertMaterial( { color: 0xffffff, overdraw: true } ) );
		 		mainVein.name="vein";
		 		activePart = mainVein;
		 		scene.add( mainVein );
		 		 mainVein.scale.x = mainVein.scale.y = mainVein.scale.z = 1;

				setModelWithJsonParams(mainVein, veinJson);			
		 		addControls(mainVein);	
		 		render();
		 		
			console.log(mainVein);
		 	} );				
		
			}
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

	function animate() {
		requestAnimationFrame( animate );
		render();
	}

	function render() {
		// stats.update();
		renderer.render( scene, camera );
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