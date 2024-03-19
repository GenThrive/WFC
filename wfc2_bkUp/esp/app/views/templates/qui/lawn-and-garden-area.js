define(['handlebars'], function(Handlebars) {return Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression;


  buffer += "<div id=\"lawn-art\">\n  <img id=\"lawn-small\" src=\"";
  if (stack1 = helpers.appRoot) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = (depth0 && depth0.appRoot); stack1 = typeof stack1 === functionType ? stack1.call(depth0, {hash:{},data:data}) : stack1; }
  buffer += escapeExpression(stack1)
    + "images/lawn.svg\"/>\n  <img id=\"lawn-large\" src=\"";
  if (stack1 = helpers.appRoot) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = (depth0 && depth0.appRoot); stack1 = typeof stack1 === functionType ? stack1.call(depth0, {hash:{},data:data}) : stack1; }
  buffer += escapeExpression(stack1)
    + "images/lawn-large.svg\"/>\n</div>\n<div id=\"lawn-area\">\n  \n</div>\n\n<div id=\"water-frequency\">\n  \n</div>\n\n\n<div>\n  <div class=\"prev-btn pill-button ball\"><span class=\"icon icon-chevron-left\"></span></div>\n  <div class=\"next-btn pill-button\"><span>SIGUIENTE</span><span class=\"icon icon-chevron-right\"></span></div>\n</div>\n";
  return buffer;
  });});