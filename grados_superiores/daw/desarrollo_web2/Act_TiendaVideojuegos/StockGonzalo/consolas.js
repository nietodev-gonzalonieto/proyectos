class Consola {
  constructor(nombreConsola, gpu, cpu, ram, ssd, stockConsola, precioConsola , color){
    this._nombreConsola=nombreConsola;
    this._gpu=parseInt(gpu);
    this._cpu=parseInt(cpu);
    this._ram=parseInt(ram);
    this._ssd=parseInt(ssd);
    this._stockConsola=parseInt(stockConsola);
    this._precioConsola=parseInt(precioConsola);
    this._color=color;
    this._consolasVendidas=0;
  }
//Getters
  get nombreConsola(){
    return this._nombreConsola;
  }
  get gpu(){
    return this._gpu;
  }
  get cpu(){
    return this._cpu;
  }
  get ram(){
    return this._ram;
  }
  get ssd(){
    return this._ssd;
  }
  get stockConsola(){
    return this._stockConsola;
  }
  get precioConsola(){
    return this._precioConsola;
  }
  get consolasVendidas(){
    return this._consolasVendidas;
  }
  get color(){
    return this._color;
  }
//Setters
  set nombreConsola(nombreConsola){
   this._nombreConsola = nombreConsola;
  }
  set gpu(gpu){
   this._gpu=parseInt(gpu);
  }
  set cpu(cpu){
   this._cpu=parseInt(cpu);
  }
  set ram(ram){
   this._ram=parseInt(ram);
  }
  set ssd(ssd){
   this._ssd=parseInt(ssd);
  }
  set stockConsola(stockConsola){
   this._stockConsola=parseInt(stockConsola);
  }
  set precioConsola(precioConsola){
   this._precioConsola=parseInt(precioConsola);
  }
  set consolasVendidas(consolasVendidas){
    this._consolasVendidas=parseInt(consolasVendidas);
  }
  set color(color){
    this._color=color;
  }
  descripcio(){
    return "La consola: "+this._nombreConsola+" amb gpu: "+ this._gpu+" ,cpu: "+this._cpu+" ,ram: "+this._ram+" ,ssd: "+this._ssd+" , tenim en stock: "+this._stockConsola+" ,val: "+this._precioConsola+"€";
  }
}
