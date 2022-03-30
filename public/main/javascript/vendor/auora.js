import * as THREE from './three.js';
import { configuration } from '../config.js';


// MODULATION VARIABLES

var yAmp1 = 2.0;
var yAmp2 = 1.0;
var yFreq1 = 1.0;
var yFreq2 = 1.0;
var xAmp1 = 2.2;
var xAmp2 = 1.2;
var xFreq1 = 1.0;
var xFreq2 = 1.0;
var zAmp1 = 2.7;
var zAmp2 = 1.0;
var zFreq1 = 1.1;
var zFreq2 = 3.0;

/* shader load */
const vertex = `
varying vec3 vNormal;
varying vec3 vViewPosition;
uniform float time;
varying vec3 offset;
varying vec3 colorOffset;
uniform float yAmp1;
uniform float yAmp2;
uniform float yFreq1;
uniform float yFreq2;
uniform float xAmp1;
uniform float xAmp2;
uniform float xFreq1;
uniform float xFreq2;
uniform float zAmp1;
uniform float zAmp2;
uniform float zFreq1;
uniform float zFreq2;
uniform int modulation;

void main() 
{
   if (modulation == 1) 
   {
       offset.y = sin(position.x * yFreq1 * sin(time*0.5) + time*5.3) * yAmp1;
       offset.y += sin(position.x * yFreq2 * sin(time*0.7) + time*3.4) * yAmp2;

       offset.x = sin(position.z * xFreq1 * sin(time*0.3) + time*2.1) * xAmp1;
       offset.x += sin(position.z * xFreq2 * sin(time*0.5) + time*1.1) * xAmp2;

       offset.z = sin(position.y * zFreq1 * sin(time*0.1) + time*0.7) * zAmp1;
       offset.z += sin(position.y * zFreq2 * sin(time*0.04) + time*0.3) * zAmp2;
   } 
   else 
   {
       offset.y = sin(position.x * yFreq1 + time*5.3) * yAmp1;
       offset.y += sin(position.x * yFreq2 + time*3.4) * yAmp2;

       offset.x = sin(position.z * xFreq1 + time*2.1) * xAmp1;
       offset.x += sin(position.z * xFreq2 + time*1.1) * xAmp2;

       offset.z = sin(position.y * zFreq1 + time*0.7) * zAmp1;
       offset.z += sin(position.y * zFreq2 + time*0.3) * zAmp2;
   }
   

   vec3 newPos = position + normal * offset;
   colorOffset = newPos - position;
   colorOffset = clamp(colorOffset, 0.0, 100.0);

   gl_Position = projectionMatrix * modelViewMatrix * vec4( newPos, 1.0 );
   vNormal = normalize( normalMatrix * normal );
   vec4 mvPosition = modelViewMatrix * vec4( position, 1.0 );
   vViewPosition = -mvPosition.xyz;

}`;
const fragmen = `
uniform vec3 uMaterialColor;

uniform vec3 uDirLightPos;
uniform vec3 uDirLightColor;

uniform float uKd;
uniform float uBorder;

varying vec3 vNormal;
varying vec3 vViewPosition;

varying vec3 offset;
varying vec3 colorOffset;

uniform vec3 color1;
uniform vec3 color2;
uniform vec3 color3;

uniform int doesLighting;

void main() 
{
   vec4 lDirection = viewMatrix * vec4( uDirLightPos, 0.0 );
   vec3 lVector = normalize( lDirection.xyz );
   vec3 normal = normalize( vNormal );
   float diffuse = max( dot( normal, lVector ), 0.0);

   vec3 newMatColor;
   newMatColor.r += color1.r*colorOffset.x + color2.r*colorOffset.y + color3.r*colorOffset.z;
   newMatColor.g += color1.g*colorOffset.x + color2.g*colorOffset.y + color3.g*colorOffset.z;
   newMatColor.b += color1.b*colorOffset.x + color2.b*colorOffset.y + color3.b*colorOffset.z;

   if (doesLighting==1) {
       gl_FragColor = vec4( uKd * newMatColor * uDirLightColor * diffuse, 1.0 );
   } else {
       gl_FragColor = vec4( uKd * newMatColor, 1.0 );
   }

}`;
/* hex2rgb convertion */
function hex2rgb(hex) {
    return ['0x' + hex[1] + hex[2] | 0, '0x' + hex[3] + hex[4] | 0, '0x' + hex[5] + hex[6] | 0];
};

function lerp(x, y, a) {
    return (1 - a) * x + a * y
};
// Used to fit the lerps to start and end at specific scrolling percentages
function scalePercent(start, end) {
    return (scrollPercent - start) / (end - start)
};

let container;
container = document.querySelector(".scene");
var scene = new THREE.Scene();

const fov = 75;
const near = 0.1;
const far = 400;
const aspect = container.clientWidth / container.clientHeight;

//Camera setup
var camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
var mouse = new THREE.Vector3();
var target = new THREE.Vector3();
var windowHalf = new THREE.Vector3(window.innerWidth / 1, window.innerHeight / 1);

camera.position.z = 17;
let pixelRatio = window.devicePixelRatio
let AA = true
if (pixelRatio > 1) {
    AA = false
}
var renderer = new THREE.WebGLRenderer({ alpha: true, antialias: AA, powerPreference: "high-performance" });
renderer.setSize(container.clientWidth, container.clientHeight);
container.appendChild(renderer.domElement);
renderer.setPixelRatio((window.devicePixelRatio) ? window.devicePixelRatio : 1);
renderer.toneMapping = THREE.ReinhardToneMapping;
const color = 0xFFFFFF;
const intensity = 1;
const light = new THREE.DirectionalLight(color, intensity);
light.position.set(0, 100, 200);

var ambientLight = new THREE.AmbientLight(0xFFFFFF, 3);
scene.add(ambientLight);

var sphereRes = configuration.quality;
var oldSphereRes = sphereRes;
var geometry = new THREE.IcosahedronGeometry(9, sphereRes);
var material = new THREE.MeshLambertMaterial();
var materialColor = new THREE.Color();
materialColor.setRGB(0.0, 0.8, 0.1);
material.color = materialColor.convertSRGBToLinear();

var phongMaterial = createShaderMaterial("phongDiffuse", light);
phongMaterial.uniforms.uMaterialColor.value.copy(materialColor.convertSRGBToLinear());
phongMaterial.side = THREE.DoubleSide;
phongMaterial.wireframe = configuration.wireframe;

var sphere = new THREE.Mesh(geometry, phongMaterial);
scene.add(sphere);
sphere.position.x = configuration.positionX;
sphere.position.y = configuration.positionY;
sphere.rotation.x = configuration.rotateX;
var clock = new THREE.Clock();

var color1 = new THREE.Color(hex2rgb(configuration.colorsgradient.gradientone)[0], hex2rgb(configuration.colorsgradient.gradientone)[1], hex2rgb(configuration.colorsgradient.gradientone)[2]);
var color2 = new THREE.Color(hex2rgb(configuration.colorsgradient.gradienttwo)[0], hex2rgb(configuration.colorsgradient.gradienttwo)[1], hex2rgb(configuration.colorsgradient.gradienttwo)[2]);
var color3 = new THREE.Color(hex2rgb(configuration.colorsgradient.gradienttree)[0], hex2rgb(configuration.colorsgradient.gradienttree)[1], hex2rgb(configuration.colorsgradient.gradienttree)[2]);

var uKd = 1.0;
var waveSpeed = configuration.speedwave;
var rotationSpeed = configuration.rotatespeed;
var lighting = true;
var modulation = configuration.modular;

let geometrys = new THREE.SphereBufferGeometry(0.1, 2, 2);
let materials = new THREE.MeshStandardMaterial({ color: 0xffffff });



//detect mobile device
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

if (!isMobile.any()) {
    document.addEventListener('mousemove', onMouseMove, false);

    function onMouseMove(event) {
        mouse.x = (event.clientX - windowHalf.x);
        mouse.y = (event.clientY - windowHalf.x);
    };

};

function addStar() {
    let stars = new THREE.Mesh(geometrys, materials);
    const [x, y, z] = Array(10)
        .fill()
        .map(() => THREE.MathUtils.randFloatSpread(100));
    stars.position.set(x, y, z);
    scene.add(stars);
}
if (configuration.showstar) {
    Array(configuration.star).fill().forEach(addStar);
}



const animationScripts = []
    //add an animation that flashes
animationScripts.push({
    start: 0,
    end: 101,
    func: () => {}
});
//add an animation that moves 
animationScripts.push({
    start: 0,
    end: 0,
    func: () => {
        camera.position.set(0, 0, 17)
        scene.position.set(0, 0, 0)
        scene.rotation.set(0, 0, 0)
    }
});
//add an animation that moves 
animationScripts.push({
    start: 0,
    end: 40,
    func: () => {

        camera.lookAt(scene.position)
        camera.position.set(0, 1, 2)
        scene.position.z = lerp(-18, 0, scalePercent(0, 100))
        scene.rotation.set(0, 0, 0)
    }
});
//add an animation that rotates 
animationScripts.push({
    start: 40,
    end: 60,
    func: () => {
        camera.lookAt(scene.position)
        scene.rotation.y = lerp(0, Math.PI, scalePercent(40, 60));
    }
});
//add an animation that moves
animationScripts.push({
    start: 60,
    end: 80,
    func: () => {
        camera.position.x = lerp(0, 5, scalePercent(60, 80));
        camera.position.y = lerp(1, 5, scalePercent(60, 80));
        camera.lookAt(scene.position);
    }
});
//add an animation that moves
animationScripts.push({
    start: 80,
    end: 90,
    func: () => {
        camera.position.x = lerp(0, 5, scalePercent(0, 100));
        camera.position.y = lerp(1, 5, scalePercent(0, 150));
        camera.position.z = lerp(-18, 0, scalePercent(0, 100));
        camera.lookAt(scene.position);
    }
});
//add an animation that auto rotates
animationScripts.push({
    start: 90,
    end: 101,
    func: () => {
        //auto rotate
        camera.lookAt(scene.position);
        camera.position.set(-18, 0, scalePercent(0, 100));
        scene.rotation.x += 0.01;
        scene.rotation.y += 0.01;
    }
});

function playScrollAnimations() {
    animationScripts.forEach((a) => {
        if (scrollPercent >= a.start && scrollPercent < a.end) {
            a.func();
        }
    });
};

let scrollPercent = 0;

function createShaderMaterial(id, light) {

    // could be a global, defined once, but here for convenience
    var shaderTypes = {
        'phongDiffuse': {
            uniforms: {
                "uDirLightPos": { type: "v3", value: new THREE.Vector3() },
                "uDirLightColor": { type: "c", value: new THREE.Color(0xFFFFFF) },
                "uMaterialColor": { type: "c", value: new THREE.Color(0xFFFFFF) },
                "time": { type: "f", value: 0.0 },
                "color1": { type: "c", value: new THREE.Color("rgb(0,0,255)") },
                "color2": { type: "c", value: new THREE.Color("rgb(0,0,255)") },
                "color3": { type: "c", value: new THREE.Color("rgb(0,0,255)") },

                doesLighting: { type: "i", value: 1 },
                modulation: { type: "i", value: 1 },

                uKd: {
                    type: "f",
                    value: 0.7
                },
                uBorder: {
                    type: "f",
                    value: 0.4
                },

                yAmp1: { type: "f", value: yAmp1 },
                yAmp2: { type: "f", value: yAmp2 },
                yFreq1: { type: "f", value: yFreq1 },
                yFreq2: { type: "f", value: yFreq2 },
                xAmp1: { type: "f", value: xAmp1 },
                xAmp2: { type: "f", value: xAmp2 },
                xFreq1: { type: "f", value: xFreq1 },
                xFreq2: { type: "f", value: xFreq2 },
                zAmp1: { type: "f", value: zAmp1 },
                zAmp2: { type: "f", value: zAmp2 },
                zFreq1: { type: "f", value: zFreq1 },
                zFreq2: { type: "f", value: zFreq2 }
            }
        }
    };
    var shader = shaderTypes[id];
    var u = THREE.UniformsUtils.clone(shader.uniforms);
    // this line will load a shader that has an id of "vertex" from the .html file
    var vs = vertex;
    // this line will load a shader that has an id of "fragment" from the .html file
    var fs = fragmen;
    var material = new THREE.ShaderMaterial({ uniforms: u, vertexShader: vs, fragmentShader: fs });
    material.uniforms.uDirLightPos.value = light.position;
    material.uniforms.uDirLightColor.value = light.color;
    return material;
};


function resizeRendererToDisplaySize(renderer) {
    const canvas = renderer.domElement;
    const width = canvas.clientWidth;
    const height = canvas.clientHeight;
    const needResize = canvas.width !== width || canvas.height !== height;
    if (needResize) {
        renderer.setSize(width, height, false);
    }
    return needResize;
};
let then = 0;

function render(now) {

    target.x = (1 - mouse.x) * 0.0005;
    target.y = (1 - mouse.y) * 0.0005;
    camera.rotation.x += 0.05 * (target.y - camera.rotation.x);
    camera.rotation.y += 0.05 * (target.x - camera.rotation.y);
    update();
    renderer.render(scene, camera);
    now *= 0.001; // convert to seconds
    //const deltaTime = now - then;
    then = now;

    if (resizeRendererToDisplaySize(renderer)) {
        const canvas = renderer.domElement;
        camera.aspect = canvas.clientWidth / canvas.clientHeight;
        camera.updateProjectionMatrix();
        //composer.setSize(canvas.width, canvas.height);
    }

    //composer.render(deltaTime);
    requestAnimationFrame(render);
};
render();

function update() {

    // material.color = materialColor;
    phongMaterial.uniforms.uMaterialColor.value.copy(materialColor);
    phongMaterial.uniforms.time.value += clock.getDelta() * waveSpeed;
    phongMaterial.uniforms.uKd.value = uKd;
    phongMaterial.uniforms.doesLighting.value = lighting;
    phongMaterial.uniforms.modulation.value = modulation;
    phongMaterial.uniforms.color1.value.r = color1.r / 255;
    phongMaterial.uniforms.color1.value.g = color1.g / 255;
    phongMaterial.uniforms.color1.value.b = color1.b / 255;
    phongMaterial.uniforms.color2.value.r = color2.r / 255;
    phongMaterial.uniforms.color2.value.g = color2.g / 255;
    phongMaterial.uniforms.color2.value.b = color2.b / 255;
    phongMaterial.uniforms.color3.value.r = color3.r / 255;
    phongMaterial.uniforms.color3.value.g = color3.g / 255;
    phongMaterial.uniforms.color3.value.b = color3.b / 255;
    phongMaterial.uniforms.yAmp1.value = yAmp1;
    phongMaterial.uniforms.yAmp2.value = yAmp2;
    phongMaterial.uniforms.yFreq1.value = yFreq1;
    phongMaterial.uniforms.yFreq2.value = yFreq2;
    phongMaterial.uniforms.xAmp1.value = xAmp1;
    phongMaterial.uniforms.xAmp2.value = xAmp2;
    phongMaterial.uniforms.xFreq1.value = xFreq1;
    phongMaterial.uniforms.xFreq2.value = xFreq2;
    phongMaterial.uniforms.zAmp1.value = zAmp1;
    phongMaterial.uniforms.zAmp2.value = zAmp2;
    phongMaterial.uniforms.zFreq1.value = zFreq1;
    phongMaterial.uniforms.zFreq2.value = zFreq2;
    sphere.rotation.x += 0.001 * rotationSpeed;
    sphere.rotation.y += 0.002 * rotationSpeed;
    sphere.rotation.z += 0.0006 * rotationSpeed;


};
window.addEventListener('resize', function() {
    var WIDTH = window.innerWidth,
        HEIGHT = window.innerHeight;
    renderer.setSize(WIDTH, HEIGHT);
    camera.aspect = WIDTH / HEIGHT;
    camera.updateProjectionMatrix();
});

document.body.onscroll = () => {
    //calculate the current scroll progress as a percentage
    scrollPercent =
        ((document.documentElement.scrollTop || document.body.scrollTop) /
            ((document.documentElement.scrollHeight || document.body.scrollHeight) -
                document.documentElement.clientHeight)) * 100
};

function animate() {
    requestAnimationFrame(animate);
    if (isMobile.any()) {
        if (configuration.animinmobile) {
            playScrollAnimations();
        }
    } else {
        playScrollAnimations();
    }
};
animate();