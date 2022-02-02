// document.getElementById('form').onsubmit = function (){
//     // window.confirm('押されました');
//     const conf = document.getElementById('conf').value;
//     const bake = document.getElementById('form').bake.value;
//     const arrived = document.getElementById('form').arrived.value;
//     const fin = document.getElementById('form').fin.value;

// }

const conf = document.getElementById('conf');
const bake = document.getElementById('bake');
const arrived = document.getElementById('arrived');
const fin = document.getElementById('fin');

function beforeSubmit() {
  if(window.confirm('本当に変更してよろしいですか？')) {
    return true;
  } else {
    return false;
  }
}

// document.getElementById('conf').addEventListener('click', function(){
//     window.confirm(`本当に${conf.value}してよろしいですか？`);

//   });

//   document.getElementById('bake').addEventListener('click', function(){
//     window.confirm(`本当に${bake.value}してよろしいですか？`);
//   });

//   document.getElementById('arrived').addEventListener('click', function(){
//     window.confirm(`本当に${arrived.value}してよろしいですか？`);
//   });

//   document.getElementById('fin').addEventListener('click', function(){
//     window.confirm(`本当に${fin.value}してよろしいですか？`);
//   });