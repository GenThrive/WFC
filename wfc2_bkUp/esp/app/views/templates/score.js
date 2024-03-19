define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  


  return "<div id=\"meter\"></div>\n<div id=\"score-display\">\n   <div id=\"show-bubble-footprint\">Your water footprint:</div>\n  <div id=\"show-bubble-detail\">Revele: sus resultados a detalle</div>\n  <span class=\"tri\"></span>\n  <span id=\"score-label\">Su Huella Hídrica:</span>\n <span id=\"score-value\"></span>\n  <span id=\"score-units\">Galones/Día</span>\n  <div id=\"score-graph\" class=\"button pill-button ball\">\n    <span class=\"icon icon-graph-bar\"></span>\n  </div>\n  <div id=\"score-table\" class=\"button pill-button ball\">\n    <span class=\"icon icon-view-list\"></span>\n  </div>\n  <div class=\"household-score\"></div>\n</div>\n<div id=\"water\">\n  <div id=\"surface\">\n    <canvas id=\"water-surface-one\"></canvas>\n    <canvas id=\"water-surface-two\"></canvas>\n  </div>\n  <div id=\"volume\"></div>\n</div>\n";
  });});