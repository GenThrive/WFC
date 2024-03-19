define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "<h3 class=\"indoor\">Agua en el interior</h3>\n<h3 class=\"outdoor\">Agua exterior</h3>\n<h3 class=\"Virtual\">Agua virtual</h3>\n<div class=\"graph-bars-container\">\n  <div class=\"graph-depth\">\n    <span class='large_text'>Haga “Clic” en cualquier objeto arriba o desplácese hacia abajo para mayor información.</span>\n  </div>\n  <div class=\"graph-bars\"></div>\n</div>\n";
  });});