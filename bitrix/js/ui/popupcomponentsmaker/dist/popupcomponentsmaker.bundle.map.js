{"version":3,"sources":["popupcomponentsmaker.bundle.js"],"names":["this","BX","exports","main_core_events","main_loader","main_core","main_popup","_templateObject","PopupComponentsMakerItem","_EventEmitter","babelHelpers","inherits","_this","options","arguments","length","undefined","classCallCheck","possibleConstructorReturn","getPrototypeOf","call","html","Type","isDomNode","awaitContent","isBoolean","flex","isNumber","withoutBackground","backgroundColor","isString","layout","container","await","createClass","key","value","getLoader","loader","Loader","target","getContainer","size","_await","classList","add","showLoader","stopAwait","remove","hideLoader","show","hide","getContent","updateContent","node","Dom","clean","appendChild","setBackgroundColor","color","style","Tag","render","taggedTemplateLiteral","EventEmitter","_templateObject$1","_templateObject2","_templateObject3","PopupComponentsMaker","isElementNode","content","contentWrapper","popup","items","width","getItems","getItem","item","indexOf","push","getPopup","popupWidth","Popup","className","background","contentBackground","angle","offset","offsetLeft","offsetWidth","autoHide","closeByEsc","padding","animation","getContentWrapper","getContentContainer","overflowX","isShown","map","_item$html","sectionNode","getSection","marginBottom","isArray","innerSection","itemObj","_itemObj$html","then","adjustPromise","itemInner","isFunction","_item$html2","close","UI","Event","Main"],"mappings":"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","file":"popupcomponentsmaker.bundle.map.js"}