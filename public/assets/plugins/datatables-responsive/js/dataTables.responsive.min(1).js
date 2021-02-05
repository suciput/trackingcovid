/*!
 Responsive 2.2.6
 2014-2020 SpryMedia Ltd - datatables.net/license
*/
(function(d){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(m){return d(m,window,document)}):"object"===typeof exports?module.exports=function(m,l){m||(m=window);if(!l||!l.fn.dataTable)l=require("datatables.net")(m,l).$;return d(l,m,m.document)}:d(jQuery,window,document)})(function(d,m,l,q){function t(a,b,c){var e=b+"-"+c;if(n[e])return n[e];for(var d=[],a=a.cell(b,c).node().childNodes,b=0,c=a.length;b<c;b++)d.push(a[b]);return n[e]=d}function r(a,b,c){var e=b+
"-"+c;if(n[e]){for(var a=a.cell(b,c).node(),c=n[e][0].parentNode.childNodes,b=[],d=0,g=c.length;d<g;d++)b.push(c[d]);c=0;for(d=b.length;c<d;c++)a.appendChild(b[c]);n[e]=q}}var o=d.fn.dataTable,i=function(a,b){if(!o.versionCheck||!o.versionCheck("1.10.10"))throw"DataTables Responsive requires DataTables 1.10.10 or newer";this.s={dt:new o.Api(a),columns:[],current:[]};this.s.dt.settings()[0].responsive||(b&&"string"===typeof b.details?b.details={type:b.details}:b&&!1===b.details?b.details={type:!1}:
b&&!0===b.details&&(b.details={type:"inline"}),this.c=d.extend(!0,{},i.defaults,o.defaults.responsive,b),a.responsive=this,this._constructor())};d.extend(i.prototype,{_constructor:function(){var a=this,b=this.s.dt,c=b.settings()[0],e=d(m).innerWidth();b.settings()[0]._responsive=this;d(m).on("resize.dtr orientationchange.dtr",o.util.throttle(function(){var b=d(m).innerWidth();b!==e&&(a._resize(),e=b)}));c.oApi._fnCallbackReg(c,"aoRowCreatedCallback",function(c){-1!==d.inArray(!1,a.s.current)&&d(">td, >th",
c).each(function(c){c=b.column.index("toData",c);!1===a.s.current[c]&&d(this).css("display","none")})});b.on("destroy.dtr",function(){b.off(".dtr");d(b.table().body()).off(".dtr");d(m).off("resize.dtr orientationchange.dtr");b.cells(".dtr-control").nodes().to$().removeClass("dtr-control");d.each(a.s.current,function(b,c){!1===c&&a._setColumnVis(b,!0)})});this.c.breakpoints.sort(function(a,b){return a.width<b.width?1:a.width>b.width?-1:0});this._classLogic();this._resizeAuto();c=this.c.details;!1!==
c.type&&(a._detailsInit(),b.on("column-visibility.dtr",function(){a._timer&&clearTimeout(a._timer);a._timer=setTimeout(function(){a._timer=null;a._classLogic();a._resizeAuto();a._resize(!0);a._redrawChildren()},100)}),b.on("draw.dtr",function(){a._redrawChildren()}),d(b.table().node()).addClass("dtr-"+c.type));b.on("column-reorder.dtr",function(){a._classLogic();a._resizeAuto();a._resize(true)});b.on("column-sizing.dtr",function(){a._resizeAuto();a._resize()});b.on("preXhr.dtr",function(){var c=[];
b.rows().every(function(){this.child.isShown()&&c.push(this.id(true))});b.one("draw.dtr",function(){a._resizeAuto();a._resize();b.rows(c).every(function(){a._detailsDisplay(this,false)})})});b.on("draw.dtr",function(){a._controlClass()}).on("init.dtr",function(c){if(c.namespace==="dt"){a._resizeAuto();a._resize();d.inArray(false,a.s.current)&&b.columns.adjust()}});this._resize()},_columnsVisiblity:function(a){var b=this.s.dt,c=this.s.columns,e,f,g=c.map(function(a,b){return{columnIdx:b,priority:a.priority}}).sort(function(a,
b){return a.priority!==b.priority?a.priority-b.priority:a.columnIdx-b.columnIdx}),j=d.map(c,function(c,e){return!1===b.column(e).visible()?"not-visible":c.auto&&null===c.minWidth?!1:!0===c.auto?"-":-1!==d.inArray(a,c.includeIn)}),h=0;e=0;for(f=j.length;e<f;e++)!0===j[e]&&(h+=c[e].minWidth);e=b.settings()[0].oScroll;e=e.sY||e.sX?e.iBarWidth:0;h=b.table().container().offsetWidth-e-h;e=0;for(f=j.length;e<f;e++)c[e].control&&(h-=c[e].minWidth);var s=!1;e=0;for(f=g.length;e<f;e++){var k=g[e].columnIdx;
"-"===j[k]&&(!c[k].control&&c[k].minWidth)&&(s||0>h-c[k].minWidth?(s=!0,j[k]=!1):j[k]=!0,h-=c[k].minWidth)}g=!1;e=0;for(f=c.length;e<f;e++)if(!c[e].control&&!c[e].never&&!1===j[e]){g=!0;break}e=0;for(f=c.length;e<f;e++)c[e].control&&(j[e]=g),"not-visible"===j[e]&&(j[e]=!1);-1===d.inArray(!0,j)&&(j[0]=!0);return j},_classLogic:function(){var a=this,b=this.c.breakpoints,c=this.s.dt,e=c.columns().eq(0).map(function(a){var b=this.column(a),e=b.header().className,a=c.settings()[0].aoColumns[a].responsivePriority,
b=b.header().getAttribute("data-priority");a===q&&(a=b===q||null===b?1E4:1*b);return{className:e,includeIn:[],auto:!1,control:!1,never:e.match(/\bnever\b/)?!0:!1,priority:a}}),f=function(a,b){var c=e[a].includeIn;-1===d.inArray(b,c)&&c.push(b)},g=function(c,d,g,k){if(g)if("max-"===g){k=a._find(d).width;d=0;for(g=b.length;d<g;d++)b[d].width<=k&&f(c,b[d].name)}else if("min-"===g){k=a._find(d).width;d=0;for(g=b.length;d<g;d++)b[d].width>=k&&f(c,b[d].name)}else{if("not-"===g){d=0;for(g=b.length;d<g;d++)-1===
b[d].name.indexOf(k)&&f(c,b[d].name)}}else e[c].includeIn.push(d)};e.each(function(a,c){for(var e=a.className.split(" "),f=!1,i=0,m=e.length;i<m;i++){var l=e[i].trim();if("all"===l){f=!0;a.includeIn=d.map(b,function(a){return a.name});return}if("none"===l||a.never){f=!0;return}if("control"===l||"dtr-control"===l){f=!0;a.control=!0;return}d.each(b,function(a,b){var d=b.name.split("-"),e=l.match(RegExp("(min\\-|max\\-|not\\-)?("+d[0]+")(\\-[_a-zA-Z0-9])?"));e&&(f=!0,e[2]===d[0]&&e[3]==="-"+d[1]?g(c,
b.name,e[1],e[2]+e[3]):e[2]===d[0]&&!e[3]&&g(c,b.name,e[1],e[2]))})}f||(a.auto=!0)});this.s.columns=e},_controlClass:function(){if("inline"===this.c.details.type){var a=this.s.dt,b=d.inArray(!0,this.s.current);a.cells(null,function(a){return a!==b},{page:"current"}).nodes().to$().filter(".dtr-control").removeClass("dtr-control");a.cells(null,b,{page:"current"}).nodes().to$().addClass("dtr-control")}},_detailsDisplay:function(a,b){var c=this,e=this.s.dt,f=this.c.details;if(f&&!1!==f.type){var g=f.display(a,
b,function(){return f.renderer(e,a[0],c._detailsObj(a[0]))});(!0===g||!1===g)&&d(e.table().node()).triggerHandler("responsive-display.dt",[e,a,g,b])}},_detailsInit:function(){var a=this,b=this.s.dt,c=this.c.details;"inline"===c.type&&(c.target="td.dtr-control, th.dtr-control");b.on("draw.dtr",function(){a._tabIndexes()});a._tabIndexes();d(b.table().body()).on("keyup.dtr","td, th",function(a){a.keyCode===13&&d(this).data("dtr-keyboard")&&d(this).click()});var e=c.target;if(e!==q||null!==e)d(b.table().body()).on("click.dtr mousedown.dtr mouseup.dtr",
"string"===typeof e?e:"td, th",function(c){if(d(b.table().node()).hasClass("collapsed")&&d.inArray(d(this).closest("tr").get(0),b.rows().nodes().toArray())!==-1){if(typeof e==="number"){var g=e<0?b.columns().eq(0).length+e:e;if(b.cell(this).index().column!==g)return}g=b.row(d(this).closest("tr"));c.type==="click"?a._detailsDisplay(g,false):c.type==="mousedown"?d(this).css("outline","none"):c.type==="mouseup"&&d(this).trigger("blur").css("outline","")}})},_detailsObj:function(a){var b=this,c=this.s.dt;
return d.map(this.s.columns,function(e,f){if(!e.never&&!e.control){var g=c.settings()[0].aoColumns[f];return{className:g.sClass,columnIndex:f,data:c.cell(a,f).render(b.c.orthogonal),hidden:c.column(f).visible()&&!b.s.current[f],rowIndex:a,title:null!==g.sTitle?g.sTitle:d(c.column(f).header()).text()}}})},_find:function(a){for(var b=this.c.breakpoints,c=0,d=b.length;c<d;c++)if(b[c].name===a)return b[c]},_redrawChildren:function(){var a=this,b=this.s.dt;b.rows({page:"current"}).iterator("row",function(c,
d){b.row(d);a._detailsDisplay(b.row(d),!0)})},_resize:function(a){var b=this,c=this.s.dt,e=d(m).innerWidth(),f=this.c.breakpoints,g=f[0].name,j=this.s.columns,h,i=this.s.current.slice();for(h=f.length-1;0<=h;h--)if(e<=f[h].width){g=f[h].name;break}var k=this._columnsVisiblity(g);this.s.current=k;f=!1;h=0;for(e=j.length;h<e;h++)if(!1===k[h]&&!j[h].never&&!j[h].control&&!1===!c.column(h).visible()){f=!0;break}d(c.table().node()).toggleClass("collapsed",f);var l=!1,n=0;c.columns().eq(0).each(function(c,
d){!0===k[d]&&n++;if(a||k[d]!==i[d])l=!0,b._setColumnVis(c,k[d])});l&&(this._redrawChildren(),d(c.table().node()).trigger("responsive-resize.dt",[c,this.s.current]),0===c.page.info().recordsDisplay&&d("td",c.table().body()).eq(0).attr("colspan",n));b._controlClass()},_resizeAuto:function(){var a=this.s.dt,b=this.s.columns;if(this.c.auto&&-1!==d.inArray(!0,d.map(b,function(a){return a.auto}))){d.isEmptyObject(n)||d.each(n,function(b){b=b.split("-");r(a,1*b[0],1*b[1])});a.table().node();var c=a.table().node().cloneNode(!1),
e=d(a.table().header().cloneNode(!1)).appendTo(c),f=d(a.table().body()).clone(!1,!1).empty().appendTo(c);c.style.width="auto";var g=a.columns().header().filter(function(b){return a.column(b).visible()}).to$().clone(!1).css("display","table-cell").css("width","auto").css("min-width",0);d(f).append(d(a.rows({page:"current"}).nodes()).clone(!1)).find("th, td").css("display","");if(f=a.table().footer()){var f=d(f.cloneNode(!1)).appendTo(c),j=a.columns().footer().filter(function(b){return a.column(b).visible()}).to$().clone(!1).css("display",
"table-cell");d("<tr/>").append(j).appendTo(f)}d("<tr/>").append(g).appendTo(e);"inline"===this.c.details.type&&d(c).addClass("dtr-inline collapsed");d(c).find("[name]").removeAttr("name");d(c).css("position","relative");c=d("<div/>").css({width:1,height:1,overflow:"hidden",clear:"both"}).append(c);c.insertBefore(a.table().node());g.each(function(d){d=a.column.index("fromVisible",d);b[d].minWidth=this.offsetWidth||0});c.remove()}},_responsiveOnlyHidden:function(){var a=this.s.dt;return d.map(this.s.current,
function(b,d){return!1===a.column(d).visible()?!0:b})},_setColumnVis:function(a,b){var c=this.s.dt,e=b?"":"none";d(c.column(a).header()).css("display",e);d(c.column(a).footer()).css("display",e);c.column(a).nodes().to$().css("display",e);d.isEmptyObject(n)||c.cells(null,a).indexes().each(function(a){r(c,a.row,a.column)})},_tabIndexes:function(){var a=this.s.dt,b=a.cells({page:"current"}).nodes().to$(),c=a.settings()[0],e=this.c.details.target;b.filter("[data-dtr-keyboard]").removeData("[data-dtr-keyboard]");
"number"===typeof e?a.cells(null,e,{page:"current"}).nodes().to$().attr("tabIndex",c.iTabIndex).data("dtr-keyboard",1):("td:first-child, th:first-child"===e&&(e=">td:first-child, >th:first-child"),d(e,a.rows({page:"current"}).nodes()).attr("tabIndex",c.iTabIndex).data("dtr-keyboard",1))}});i.breakpoints=[{name:"desktop",width:Infinity},{name:"tablet-l",width:1024},{name:"tablet-p",width:768},{name:"mobile-l",width:480},{name:"mobile-p",width:320}];i.display={childRow:function(a,b,c){if(b){if(d(a.node()).hasClass("parent"))return a.child(c(),
"child").show(),!0}else{if(a.child.isShown())return a.child(!1),d(a.node()).removeClass("parent"),!1;a.child(c(),"child").show();d(a.node()).addClass("parent");return!0}},childRowImmediate:function(a,b,c){if(!b&&a.child.isShown()||!a.responsive.hasHidden())return a.child(!1),d(a.node()).removeClass("parent"),!1;a.child(c(),"child").show();d(a.node()).addClass("parent");return!0},modal:function(a){return function(b,c,e){if(c)d("div.dtr-modal-content").empty().append(e());else{var f=function(){g.remove();
d(l).off("keypress.dtr")},g=d('<div class="dtr-modal"/>').append(d('<div class="dtr-modal-display"/>').append(d('<div class="dtr-modal-content"/>').append(e())).append(d('<div class="dtr-modal-close">&times;</div>').click(function(){f()}))).append(d('<div class="dtr-modal-background"/>').click(function(){f()})).appendTo("body");d(l).on("keyup.dtr",function(a){27===a.keyCode&&(a.stopPropagation(),f())})}a&&a.header&&d("div.dtr-modal-content").prepend("<h2>"+a.header(b)+"</h2>")}}};var n={};i.renderer=
{listHiddenNodes:function(){return function(a,b,c){var e=d('<ul data-dtr-index="'+b+'" class="dtr-details"/>'),f=!1;d.each(c,function(b,c){c.hidden&&(d("<li "+(c.className?'class="'+c.className+'"':"")+' data-dtr-index="'+c.columnIndex+'" data-dt-row="'+c.rowIndex+'" data-dt-column="'+c.columnIndex+'"><span class="dtr-title">'+c.title+"</span> </li>").append(d('<span class="dtr-data"/>').append(t(a,c.rowIndex,c.columnIndex))).appendTo(e),f=!0)});return f?e:!1}},listHidden:function(){return function(a,
b,c){return(a=d.map(c,function(a){var b=a.className?'class="'+a.className+'"':"";return a.hidden?"<li "+b+' data-dtr-index="'+a.columnIndex+'" data-dt-row="'+a.rowIndex+'" data-dt-column="'+a.columnIndex+'"><span class="dtr-title">'+a.title+'</span> <span class="dtr-data">'+a.data+"</span></li>":""}).join(""))?d('<ul data-dtr-index="'+b+'" class="dtr-details"/>').append(a):!1}},tableAll:function(a){a=d.extend({tableClass:""},a);return function(b,c,e){b=d.map(e,function(a){return"<tr "+(a.className?
'class="'+a.className+'"':"")+' data-dt-row="'+a.rowIndex+'" data-dt-column="'+a.columnIndex+'"><td>'+a.title+":</td> <td>"+a.data+"</td></tr>"}).join("");return d('<table class="'+a.tableClass+' dtr-details" width="100%"/>').append(b)}}};i.defaults={breakpoints:i.breakpoints,auto:!0,details:{display:i.display.childRow,renderer:i.renderer.listHidden(),target:0,type:"inline"},orthogonal:"display"};var p=d.fn.dataTable.Api;p.register("responsive()",function(){return this});p.register("responsive.index()",
function(a){a=d(a);return{column:a.data("dtr-index"),row:a.parent().data("dtr-index")}});p.register("responsive.rebuild()",function(){return this.iterator("table",function(a){a._responsive&&a._responsive._classLogic()})});p.register("responsive.recalc()",function(){return this.iterator("table",function(a){a._responsive&&(a._responsive._resizeAuto(),a._responsive._resize())})});p.register("responsive.hasHidden()",function(){var a=this.context[0];return a._responsive?-1!==d.inArray(!1,a._responsive._responsiveOnlyHidden()):
!1});p.registerPlural("columns().responsiveHidden()","column().responsiveHidden()",function(){return this.iterator("column",function(a,b){return a._responsive?a._responsive._responsiveOnlyHidden()[b]:!1},1)});i.version="2.2.6";d.fn.dataTable.Responsive=i;d.fn.DataTable.Responsive=i;d(l).on("preInit.dt.dtr",function(a,b){if("dt"===a.namespace&&(d(b.nTable).hasClass("responsive")||d(b.nTable).hasClass("dt-responsive")||b.oInit.responsive||o.defaults.responsive)){var c=b.oInit.responsive;!1!==c&&new i(b,
d.isPlainObject(c)?c:{})}});return i});