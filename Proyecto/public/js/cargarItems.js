let prod1 = ['Harina a','https://i.blogs.es/95d4c3/harina-trigo-tipos/1024_2000.jpg','Una descripcion del elemento 1','$304'];
let prod2 = ['Harina B','https://carrefourar.vtexassets.com/arquivos/ids/205215/7792180139313_02.jpg','Una descripcion del elemento 2','$404'];
let prod3 = ['Harina ca','https://ardiaprod.vtexassets.com/arquivos/ids/221001/Harina-Leudante-DIA-1-Kg-_1.jpg','Una descripcion del elemento 3','$504'];
let prod4 = ['Harinosa','https://www.cocinaconvalentino.com.ar/4960/harina-4-0-canuelas-25kg.jpg','Una descripcion del elemento 4','$704'];
let prod5 = ['Harina Montreal','https://i.blogs.es/95d4c3/harina-trigo-tipos/1024_2000.jpg','Una descripcion del elemento 5','$1104'];

document.getElementById('selecProd').addEventListener('change', ()=>{
    let valor = document.getElementById('selecProd').value;
    switch(valor){
        case '1':
            document.getElementById('preciokg').innerHTML = prod1[3];
            document.getElementById('precioTotal').innerHTML = '$' + ( prod1[3].slice(-3)*document.getElementById('cantidad').value);
            document.getElementById('imagenProd').setAttribute("src",prod1[1]);
            document.getElementById('descripProd').innerHTML = prod1[2];
            break;
        case '2':
            document.getElementById('preciokg').innerHTML = prod2[3];
            document.getElementById('precioTotal').innerHTML = '$' + (prod2[3].slice(-3)*document.getElementById('cantidad').value);
            document.getElementById('imagenProd').setAttribute("src",prod2[1]);
            document.getElementById('descripProd').innerHTML = prod2[2];
            break;
        case '3':
            document.getElementById('preciokg').innerHTML = prod3[3];
            document.getElementById('precioTotal').innerHTML = '$' + (prod3[3].slice(-3)*document.getElementById('cantidad').value);
            document.getElementById('imagenProd').setAttribute("src",prod3[1]);
            document.getElementById('descripProd').innerHTML = prod3[2];
            break;
        case '4':
            document.getElementById('preciokg').innerHTML = prod4[3];
            document.getElementById('precioTotal').innerHTML = '$' + (prod4[3].slice(-3)*document.getElementById('cantidad').value);
            document.getElementById('imagenProd').setAttribute("src",prod4[1]);
            document.getElementById('descripProd').innerHTML = prod4[2];
            break;
    }
});

document.getElementById('cantidad').addEventListener('change', ()=>{
    document.getElementById('precioTotal').innerHTML = '$' + (document.getElementById('cantidad').value * ((document.getElementById('preciokg').innerHTML).slice(-3)));
});