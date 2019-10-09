<?php

/*
 * Template Name: Three.js page
 */
get_header();
?>
    <style>
        #canvas {
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
<div id="canvas"></div>
    <script type="x-shader/x-vertex" id="vertexshader">
			attribute float scale;
			void main() {
				vec4 mvPosition = modelViewMatrix * vec4( position, 1.0 );
				gl_PointSize = scale * ( 300.0 / - mvPosition.z );
				gl_Position = projectionMatrix * mvPosition;
			}
		</script>

    <script type="x-shader/x-fragment" id="fragmentshader">
			uniform vec3 color;
			void main() {
				if ( length( gl_PointCoord - vec2( 0.5, 0.5 ) ) > 0.475 ) discard;
				gl_FragColor = vec4( color, 1.0 );
			}
		</script>
<?php

get_footer();
?>