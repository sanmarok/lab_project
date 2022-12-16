
document.getElementById("nav-item1").addEventListener("click", ()=>{
    document.getElementById("mkPedido").style.display="none";
    document.getElementById("pedidos").style.display="flex";
    document.getElementById("nav-item1").style.background="#E1E1E1";
    document.getElementById("nav-item2").style.background="rgba(0,0,0,0.1)"
});

document.getElementById("nav-item2").addEventListener("click", ()=>{
    document.getElementById("pedidos").style.display="none";
    document.getElementById("mkPedido").style.display="flex";
    document.getElementById("nav-item2").style.background="#E1E1E1";
    document.getElementById("nav-item1").style.background="rgba(0,0,0,0.1)"

});
