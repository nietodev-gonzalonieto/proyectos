class Grafica {
  constructor(titulo,canvas){
    this._titulo = titulo;
    var canvas = document.getElementById(canvas);
    this._ctx = canvas.getContext("2d");//ctx es para dibujar en el canvas
    this._height = canvas.height;
    this._width = canvas.width;
    this._margenSuperior = 60;
    this._lado=20;
    this._margenInferior = 120;
    this._margenLateral = 60;
  }
  dibujar(consolas){
    this.dibujarBarras(consolas);
    this.dibujarLeyenda(consolas);
    this.dibujarNumero(0,this._height-this._margenInferior);
    this._ctx.stroke();
  }
  dibujarTitulo(){
    this._ctx.fillStyle="black";
    this._ctx.font="30px Arial";
    this._ctx.fillText(this._titulo,this._margenLateral,(this._margenSuperior+30)/2);
  }
  dibujarBarra(posicion,width,height,color){
    this._ctx.fillStyle = color;
    this._ctx.fillRect(posicion,this._height-this._margenInferior-height,width,height);
  }
  dibujarCuadrado(color,indice){
    this._ctx.fillStyle = color;
    this._ctx.fillRect(this._margenLateral,this._height-this._margenInferior+this._lado*indice,this._lado,this._lado);
  }
  dibujarNombre(nombre,indice){
    this._ctx.fillStyle="black";
    this._ctx.font="18px Arial";
    this._ctx.fillText(nombre,this._margenLateral+(2*this._lado),this._height-this._margenInferior+this._lado*indice-2);
  }
  dibujarNumero(numero,posicionVertical){
    this._ctx.fillStyle = "black";
    this._ctx.font="15px Arial";
    this._ctx.fillText(numero,(this._margenLateral-15)/2,posicionVertical);
  }
  dibujarBarras(consolas){
    var ancho = (this._width-this._margenLateral*2)/consolas.length;
    var altura = this._height-this._margenSuperior-this._margenInferior;
    this.dibujarBarra(0,this._width,altura,"white");//esto limpia el espacio que ocupa las barra de color blanco
    var mayor = this.mayorStock(consolas);
    for (var i = 0; i < consolas.length; i++) {
      this.dibujarBarra(this._margenLateral+i*ancho,ancho,altura*consolas[i].stockConsola/mayor,consolas[i].color);
    }
    this.dibujarNumero(mayor,this._margenSuperior+15);
    this.dibujarNumero(Math.floor(mayor/2),this._margenSuperior+15+altura/2);

  }
  dibujarLeyenda(consolas){
    this.dibujarBarra(0,this._width,-this._margenInferior,"white");//limpia el espacio que ocupa la leyenda de color blanco
    for (var i = 0; i < consolas.length; i++) {
      this.dibujarCuadrado(consolas[i].color,i+1);
      this.dibujarNombre(consolas[i].nombreConsola,i+2);
    }
  }
  //Esta funcion es para saber el valor más alto de la grafica
  mayorStock(consolas){
    var max=0;
    for (var i = 0; i < consolas.length; i++) {
      if(consolas[i].stockConsola>max){
        max = consolas[i].stockConsola;
      }
    }
    return max;
  }
}
