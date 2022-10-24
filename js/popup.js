window.addEventListener('DOMContentLoaded', () => {

    const munna = document.getElementById("munna");
    if (munna) {
  
      munna.innerHTML = `
    <div id="munna" style="position: fixed; top: 100px; right: 20px; z-index:999; background:#31B0D5; color:white; display:flex; padding:12px; align-items:center; gap:6px; border-radius: 5px; line-height: 0px; ">
    <span style="font-size:18px;"> 
    <i class="fa-sharp fa-solid fa-circle-info"></i>
    </span>
    <h6 style="color:white;">
    ${munna?.dataset?.text} </div>
    </h6> `
  
      setTimeout(() => {
        munna.innerHTML = ''
      }, munna?.dataset?.time || 2000)
  
    }
  
  })