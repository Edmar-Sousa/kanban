"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_TaskBoardTasks_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/InputForm.vue?vue&type=script&setup=true&lang=js":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/InputForm.vue?vue&type=script&setup=true&lang=js ***!
  \**************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'InputForm',
  props: ["modelValue", "error", "type", "name", "placeholder"],
  emits: ["update:modelValue"],
  setup: function setup(__props, _ref) {
    var expose = _ref.expose,
      emit = _ref.emit;
    expose();
    var props = __props;
    var __returned__ = {
      props: props,
      emit: emit
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Menu.vue?vue&type=script&setup=true&lang=js":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Menu.vue?vue&type=script&setup=true&lang=js ***!
  \*********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @inertiajs/inertia-vue3 */ "./node_modules/@inertiajs/inertia-vue3/dist/index.js");
/* harmony import */ var _Icon_Table_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../Icon/Table.vue */ "./resources/js/Icon/Table.vue");
/* harmony import */ var _Icon_People_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../Icon/People.vue */ "./resources/js/Icon/People.vue");
/* harmony import */ var _Icon_Document_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../Icon/Document.vue */ "./resources/js/Icon/Document.vue");
/* harmony import */ var _Icon_Config_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../Icon/Config.vue */ "./resources/js/Icon/Config.vue");
/* harmony import */ var _Icon_LogOut_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../Icon/LogOut.vue */ "./resources/js/Icon/LogOut.vue");






/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'Menu',
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var __returned__ = {
      Link: _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_0__.Link,
      TabletIcon: _Icon_Table_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
      PeopleIcon: _Icon_People_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
      DocumentIcon: _Icon_Document_vue__WEBPACK_IMPORTED_MODULE_3__["default"],
      ConfigIcon: _Icon_Config_vue__WEBPACK_IMPORTED_MODULE_4__["default"],
      LogOutIcon: _Icon_LogOut_vue__WEBPACK_IMPORTED_MODULE_5__["default"]
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Task.vue?vue&type=script&setup=true&lang=js":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Task.vue?vue&type=script&setup=true&lang=js ***!
  \*********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'Task',
  props: ["task"],
  emits: ["dragStart", "onDelete"],
  setup: function setup(__props, _ref) {
    var expose = _ref.expose,
      emit = _ref.emit;
    expose();
    var props = __props;
    var __returned__ = {
      props: props,
      emit: emit
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/TaskBoardTasks.vue?vue&type=script&setup=true&lang=js":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/TaskBoardTasks.vue?vue&type=script&setup=true&lang=js ***!
  \**************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia-vue3 */ "./node_modules/@inertiajs/inertia-vue3/dist/index.js");
/* harmony import */ var _Template_Layout_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../Template/Layout.vue */ "./resources/js/Template/Layout.vue");
/* harmony import */ var _Components_Task_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../Components/Task.vue */ "./resources/js/Components/Task.vue");
/* harmony import */ var _Components_InputForm_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../Components/InputForm.vue */ "./resources/js/Components/InputForm.vue");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }





/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'TaskBoardTasks',
  props: ["taskboard", "image"],
  setup: function setup(__props, _ref) {
    var _props$taskboard;
    var expose = _ref.expose;
    expose();
    var props = __props;
    var openModal = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(false);
    var formInputTasks = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)({
      id: (_props$taskboard = props.taskboard) === null || _props$taskboard === void 0 ? void 0 : _props$taskboard.id,
      title: "",
      description: ""
    });
    var formInputTasksErrors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)({
      title: "",
      description: ""
    });
    var taskToDo = (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
      var _props$taskboard2;
      return (_props$taskboard2 = props.taskboard) === null || _props$taskboard2 === void 0 ? void 0 : _props$taskboard2.tasks.filter(function (task) {
        return task.state == 1;
      });
    });
    var taskDoing = (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
      var _props$taskboard3;
      return (_props$taskboard3 = props.taskboard) === null || _props$taskboard3 === void 0 ? void 0 : _props$taskboard3.tasks.filter(function (task) {
        return task.state == 2;
      });
    });
    var taskDone = (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
      var _props$taskboard4;
      return (_props$taskboard4 = props.taskboard) === null || _props$taskboard4 === void 0 ? void 0 : _props$taskboard4.tasks.filter(function (task) {
        return task.state == 3;
      });
    });
    function closeModal() {
      openModal.value = false;
      formInputTasks.value = {
        title: "",
        description: ""
      };
    }
    function dragStart(event, item) {
      event.dataTransfer.dropEffect = "move";
      event.dataTransfer.effectAllowed = "move";
      event.dataTransfer.setData("id", item.id);
    }
    function drop(event, state) {
      var _props$taskboard5;
      var taskId = event.dataTransfer.getData("id");
      var task = (_props$taskboard5 = props.taskboard) === null || _props$taskboard5 === void 0 ? void 0 : _props$taskboard5.tasks.find(function (task) {
        return task.id == taskId;
      });
      var form = (0,_inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__.useForm)({
        id: task.id,
        state: state
      });
      form.put(route("task", {
        id: task.id
      }), {
        onSuccess: function onSuccess() {
          return task.state = state;
        },
        onError: function onError(err) {
          return console.log(err);
        }
      });
    }
    function addNewTask() {
      var form = (0,_inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__.useForm)(_objectSpread({}, formInputTasks.value));
      form.post(route("task"), {
        onSuccess: function onSuccess() {
          return formInputTasks.value = {
            title: "",
            description: ""
          };
        },
        onError: function onError(errors) {
          return formInputTasksErrors.value = errors;
        }
      });
    }
    function DeleteTask(task) {
      var form = (0,_inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__.useForm)({
        id: task.id
      });
      form["delete"](route("task"));
    }
    var __returned__ = {
      props: props,
      openModal: openModal,
      formInputTasks: formInputTasks,
      formInputTasksErrors: formInputTasksErrors,
      taskToDo: taskToDo,
      taskDoing: taskDoing,
      taskDone: taskDone,
      closeModal: closeModal,
      dragStart: dragStart,
      drop: drop,
      addNewTask: addNewTask,
      DeleteTask: DeleteTask,
      computed: vue__WEBPACK_IMPORTED_MODULE_0__.computed,
      ref: vue__WEBPACK_IMPORTED_MODULE_0__.ref,
      useForm: _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__.useForm,
      Layout: _Template_Layout_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
      Task: _Components_Task_vue__WEBPACK_IMPORTED_MODULE_3__["default"],
      InputForm: _Components_InputForm_vue__WEBPACK_IMPORTED_MODULE_4__["default"]
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Template/Layout.vue?vue&type=script&setup=true&lang=js":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Template/Layout.vue?vue&type=script&setup=true&lang=js ***!
  \*********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Components_Menu_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../Components/Menu.vue */ "./resources/js/Components/Menu.vue");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'Layout',
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var __returned__ = {
      Menu: _Components_Menu_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/InputForm.vue?vue&type=template&id=2f59aa1a":
/*!*******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/InputForm.vue?vue&type=template&id=2f59aa1a ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = ["type", "name", "id", "placeholder", "value"];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: $props.type,
    name: $props.name,
    id: "input-".concat($props.name),
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["w-full h-10 border border-[#E2E8F0] rounded text-sm px-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]", {
      'border-red-400': $props.error
    }]),
    placeholder: $props.placeholder,
    value: $props.modelValue,
    onInput: _cache[0] || (_cache[0] = function ($event) {
      return _ctx.$emit('update:modelValue', $event.target.value);
    })
  }, null, 42 /* CLASS, PROPS, HYDRATE_EVENTS */, _hoisted_1), (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
    "class": "text-xs text-red-400 mt-2"
  }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.error), 513 /* TEXT, NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vShow, $props.error]])], 64 /* STABLE_FRAGMENT */);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Menu.vue?vue&type=template&id=6b52e6ac":
/*!**************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Menu.vue?vue&type=template&id=6b52e6ac ***!
  \**************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "aria-label": "Navegação principal",
  "class": "w-full h-full max-w-[175px] pl-9 py-8 relative"
};
var _hoisted_2 = ["src"];
var _hoisted_3 = {
  "class": "mt-14"
};
var _hoisted_4 = {
  "class": "flex flex-col gap-9"
};
var _hoisted_5 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Boards");
var _hoisted_6 = {
  "class": "flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]"
};
var _hoisted_7 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
  href: "#",
  "class": "font-medium text-4"
}, "Equipes", -1 /* HOISTED */);
var _hoisted_8 = {
  "class": "flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]"
};
var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
  href: "#",
  "class": "font-medium text-4"
}, "Relatórios", -1 /* HOISTED */);
var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Ajustes");
var _hoisted_11 = {
  "class": "flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]"
};
var _hoisted_12 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Sair");
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("aside", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
    src: (__webpack_require__(/*! ~/images/logo.svg */ "./public/images/logo.svg")["default"]),
    alt: "Logo do site"
  }, null, 8 /* PROPS */, _hoisted_2), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("nav", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]", {
      'text-[#FFFFFF]': _ctx.$page.url.startsWith('/task-board')
    }])
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["TabletIcon"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["Link"], {
    href: _ctx.route('taskboard'),
    "class": "font-bold text-4"
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_5];
    }),
    _: 1 /* STABLE */
  }, 8 /* PROPS */, ["href"])], 2 /* CLASS */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_6, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["PeopleIcon"]), _hoisted_7]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["DocumentIcon"]), _hoisted_9]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["flex gap-4 items-center text-[#CAB3FF] hover:text-[#FFFFFF]", {
      'text-[#FFFFFF]': _ctx.$page.url == '/config'
    }])
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["ConfigIcon"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["Link"], {
    href: _ctx.route('config'),
    "class": "font-medium text-4"
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_10];
    }),
    _: 1 /* STABLE */
  }, 8 /* PROPS */, ["href"])], 2 /* CLASS */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_11, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["LogOutIcon"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["Link"], {
    href: _ctx.route('logout'),
    "class": "font-medium text-4"
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_12];
    }),
    _: 1 /* STABLE */
  }, 8 /* PROPS */, ["href"])])])])]);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Task.vue?vue&type=template&id=543dac60":
/*!**************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Task.vue?vue&type=template&id=543dac60 ***!
  \**************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "w-full h-[30px] flex justify-between items-center"
};
var _hoisted_2 = {
  "class": "text-sm font-bold"
};
var _hoisted_3 = ["src"];
var _hoisted_4 = {
  "class": "my-2.5 text-sm font-medium text-[#756966]"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    "class": "group/item w-full my-6 p-6 rounded-lg shadow-[0_4px_16px_0px_rgba(22,22,22,0.1)]",
    draggable: "true",
    onDragstart: _cache[1] || (_cache[1] = function ($event) {
      return _ctx.$emit('dragStart', $event, $props.task);
    })
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", _hoisted_2, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.task.title), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "arial-label": "Botão para editar tarefa",
    "class": "hidden group-hover/item:block",
    onClick: _cache[0] || (_cache[0] = function ($event) {
      return _ctx.$emit('onDelete', $props.task);
    })
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
    src: (__webpack_require__(/*! ~/images/trash.svg */ "./public/images/trash.svg")["default"]),
    alt: "Icone de uma lixeira",
    "class": "w-[20px] h-[20px]"
  }, null, 8 /* PROPS */, _hoisted_3)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_4, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.task.description), 1 /* TEXT */)], 32 /* HYDRATE_EVENTS */);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/Config.vue?vue&type=template&id=393ebe8a":
/*!**********************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/Config.vue?vue&type=template&id=393ebe8a ***!
  \**********************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  width: "18",
  height: "17",
  viewBox: "0 0 18 17",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
};
var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M17.1249 8.40576C17.1196 8.30829 17.08 8.21582 17.0131 8.14475C16.9462 8.07368 16.8562 8.0286 16.7593 8.01748L15.7577 7.85537C15.7126 7.84798 15.6712 7.82623 15.6395 7.79335C15.6078 7.76048 15.5876 7.71825 15.5819 7.67295C15.5628 7.5499 15.5429 7.42217 15.5155 7.30108C15.5067 7.25703 15.5119 7.21133 15.5303 7.17037C15.5487 7.1294 15.5795 7.09521 15.6182 7.07256L16.5081 6.57842C16.5964 6.53338 16.6652 6.45743 16.7012 6.36503C16.7372 6.27262 16.738 6.1702 16.7034 6.07725L16.5491 5.65147C16.5153 5.5582 16.4482 5.48069 16.3608 5.43377C16.2734 5.38685 16.1717 5.37382 16.0753 5.39717L15.0772 5.59248C15.0326 5.60046 14.9866 5.59414 14.9458 5.57443C14.9049 5.55472 14.8714 5.52262 14.8499 5.48272C14.7917 5.37373 14.7284 5.26279 14.6624 5.15381C14.6384 5.11498 14.6272 5.06963 14.6303 5.0241C14.6333 4.97857 14.6506 4.93515 14.6796 4.8999L15.3436 4.13272C15.4111 4.06029 15.4498 3.96577 15.4526 3.86684C15.4554 3.76791 15.4221 3.67135 15.3589 3.59522L15.069 3.24717C15.006 3.17078 14.9168 3.1205 14.8188 3.10607C14.7208 3.09163 14.621 3.11408 14.5386 3.16905L13.6647 3.69366C13.626 3.71687 13.5808 3.72701 13.5359 3.72257C13.4909 3.71814 13.4486 3.69938 13.4151 3.66905C13.3186 3.58428 13.2198 3.50264 13.1272 3.42725C13.0917 3.39921 13.066 3.36057 13.0539 3.31695C13.0419 3.27333 13.044 3.22699 13.06 3.18467L13.4218 2.23155C13.4612 2.1406 13.4658 2.03836 13.4347 1.94424C13.4037 1.85011 13.3392 1.77067 13.2534 1.721L12.8593 1.49092C12.7734 1.44143 12.6724 1.42535 12.5754 1.44574C12.4785 1.46614 12.3925 1.52159 12.3339 1.60147L11.6952 2.40381C11.6722 2.43868 11.6378 2.46447 11.5979 2.47673C11.558 2.48899 11.515 2.48696 11.4764 2.471C11.4526 2.46123 11.2511 2.37881 11.0944 2.32647C11.0514 2.31246 11.0141 2.28508 10.9878 2.24832C10.9615 2.21156 10.9477 2.16736 10.9483 2.12217L10.9636 1.10381C10.969 1.00437 10.938 0.906362 10.8764 0.82813C10.8148 0.749899 10.7267 0.696812 10.6288 0.678811L10.1815 0.600686C10.0841 0.58385 9.98382 0.602966 9.8994 0.654479C9.81498 0.705993 9.75214 0.786402 9.72254 0.880764L9.39051 1.8499C9.37543 1.89293 9.34696 1.92998 9.30928 1.95564C9.2716 1.9813 9.22669 1.99421 9.18113 1.99248H8.80027C8.75507 1.99341 8.71072 1.98006 8.67355 1.95432C8.63638 1.92858 8.60828 1.89176 8.59324 1.84912L8.26277 0.885452C8.2337 0.7904 8.17097 0.709207 8.08634 0.657076C8.00171 0.604945 7.90098 0.585453 7.80301 0.602249L7.35496 0.680374C7.25764 0.698232 7.17011 0.7508 7.10861 0.828315C7.04712 0.90583 7.01584 1.00303 7.02059 1.10186L7.03621 2.12373C7.03652 2.1696 7.02202 2.21434 6.99485 2.25129C6.96768 2.28824 6.9293 2.31543 6.88543 2.32881C6.79598 2.36358 6.60184 2.4378 6.51356 2.47061C6.43543 2.49873 6.35027 2.46787 6.28152 2.38858L5.64637 1.60733C5.58809 1.52696 5.50217 1.47098 5.40511 1.45014C5.30805 1.4293 5.20672 1.44508 5.12059 1.49444L4.72762 1.72217C4.64092 1.77194 4.5757 1.85203 4.54454 1.94702C4.51338 2.04201 4.51849 2.14517 4.55887 2.23662L4.9202 3.1874C4.93596 3.22982 4.93803 3.27611 4.92612 3.31976C4.91421 3.36341 4.88891 3.40223 4.85379 3.43076C4.75887 3.50889 4.6616 3.58701 4.56473 3.67373C4.53146 3.70383 4.48944 3.72249 4.44481 3.72699C4.40018 3.73148 4.35528 3.72158 4.31668 3.69873L3.45301 3.16397C3.37008 3.11002 3.27031 3.08819 3.17243 3.10258C3.07454 3.11696 2.98528 3.16657 2.92137 3.24209L2.6327 3.58936C2.56858 3.66497 2.53459 3.76157 2.53726 3.86067C2.53993 3.95978 2.57906 4.05442 2.64715 4.12647L3.31434 4.89287C3.34395 4.92741 3.36164 4.97056 3.36481 5.01594C3.36798 5.06132 3.35644 5.10651 3.33192 5.14483C3.26512 5.25108 3.20145 5.3628 3.14363 5.47451C3.12201 5.5147 3.08821 5.54701 3.04709 5.5668C3.00596 5.58659 2.95963 5.59284 2.91473 5.58467L1.91824 5.39209C1.82176 5.36881 1.72009 5.38187 1.63262 5.42877C1.54515 5.47568 1.47802 5.55314 1.44403 5.64639L1.28778 6.07139C1.25324 6.16446 1.25405 6.26697 1.29004 6.35948C1.32604 6.452 1.39473 6.52809 1.48309 6.57334L2.37293 7.06748C2.41295 7.08957 2.44469 7.12408 2.46337 7.1658C2.48204 7.20751 2.48663 7.25417 2.47645 7.29873L2.46707 7.34834C2.44676 7.45733 2.42801 7.56045 2.41004 7.67022C2.40383 7.71494 2.38363 7.75656 2.35234 7.78911C2.32105 7.82167 2.28027 7.84349 2.23582 7.85147L1.23231 8.01358C1.13417 8.02563 1.04377 8.07298 0.977997 8.14681C0.912224 8.22063 0.875571 8.31588 0.874885 8.41475V8.86709C0.874313 8.96634 0.91059 9.06228 0.976691 9.13632C1.04279 9.21036 1.13402 9.25723 1.2327 9.26787L2.23582 9.42959C2.2809 9.43692 2.32239 9.45866 2.35408 9.49154C2.38577 9.52443 2.40595 9.5667 2.4116 9.61201C2.43074 9.73545 2.45067 9.86279 2.47801 9.98389C2.48682 10.0279 2.48166 10.0736 2.46324 10.1146C2.44482 10.1556 2.41407 10.1898 2.37528 10.2124L1.48582 10.7073C1.39746 10.7524 1.32874 10.8283 1.29273 10.9207C1.25672 11.0131 1.25593 11.1155 1.29051 11.2085L1.44676 11.6343C1.48067 11.7275 1.54774 11.805 1.63514 11.8519C1.72254 11.8988 1.82416 11.9118 1.92059 11.8886L2.91863 11.6952C2.96327 11.6871 3.00932 11.6934 3.05017 11.7131C3.09102 11.7328 3.12456 11.765 3.14598 11.805C3.20457 11.9144 3.26746 12.0249 3.33348 12.1339C3.35757 12.1727 3.36887 12.2181 3.36579 12.2636C3.3627 12.3092 3.34539 12.3526 3.31629 12.3878L2.65223 13.1546C2.58398 13.2265 2.54433 13.3208 2.54073 13.4198C2.53714 13.5189 2.56984 13.6158 2.6327 13.6925L2.92215 14.0405C2.98515 14.117 3.07432 14.1673 3.17234 14.1818C3.27036 14.1962 3.37025 14.1737 3.45262 14.1187L4.32645 13.594C4.36519 13.5708 4.41037 13.5607 4.45532 13.5651C4.50026 13.5696 4.54259 13.5883 4.57606 13.6187C4.67293 13.7034 4.77137 13.7851 4.86395 13.8605C4.89945 13.8885 4.92512 13.9271 4.93727 13.9707C4.94941 14.0143 4.9474 14.0606 4.93152 14.103L4.56942 15.0562C4.53002 15.1471 4.52541 15.2493 4.55645 15.3435C4.58748 15.4376 4.65201 15.517 4.73777 15.5667L5.1327 15.7948C5.21847 15.8444 5.31951 15.8605 5.41645 15.8402C5.51339 15.8199 5.59943 15.7645 5.65809 15.6847L6.30457 14.8897C6.35926 14.8222 6.4452 14.7921 6.50887 14.8179C6.64481 14.8741 6.73582 14.9058 6.89715 14.9597C6.94012 14.9737 6.9775 15.0011 7.00384 15.0378C7.03018 15.0746 7.04412 15.1188 7.04363 15.164L7.02801 16.1815C7.02274 16.2809 7.05379 16.3789 7.11538 16.4571C7.17698 16.5353 7.2649 16.5884 7.36277 16.6065L7.81004 16.6847C7.90751 16.7017 8.00784 16.6826 8.09229 16.6311C8.17675 16.5796 8.23957 16.499 8.26902 16.4046L8.60106 15.437C8.61608 15.394 8.64454 15.3569 8.68223 15.3312C8.71992 15.3055 8.76486 15.2926 8.81043 15.2944H9.19129C9.23651 15.2934 9.28088 15.3068 9.31806 15.3325C9.35525 15.3583 9.38334 15.3951 9.39832 15.4378L9.72918 16.4015C9.75481 16.4851 9.80657 16.5584 9.87687 16.6105C9.94717 16.6626 10.0323 16.6908 10.1198 16.6909C10.1431 16.691 10.1664 16.6889 10.1893 16.6847L10.6374 16.6065C10.7347 16.5887 10.8222 16.5361 10.8837 16.4586C10.9452 16.3811 10.9765 16.2839 10.9718 16.1851L10.9561 15.1632C10.9558 15.1182 10.9699 15.0742 10.9962 15.0377C11.0225 15.0012 11.0598 14.974 11.1026 14.9601C11.2526 14.9097 11.3581 14.869 11.4507 14.8331L11.4741 14.8241C11.5952 14.7823 11.6538 14.8331 11.6878 14.8753L12.3421 15.6812C12.4007 15.7609 12.4867 15.8162 12.5835 15.8365C12.6804 15.8568 12.7813 15.8407 12.8671 15.7913L13.2604 15.5636C13.3465 15.5139 13.4112 15.4342 13.4423 15.3398C13.4733 15.2455 13.4685 15.1429 13.4288 15.0519L13.0679 14.1011C13.0519 14.0587 13.0497 14.0124 13.0616 13.9687C13.0734 13.9251 13.0987 13.8862 13.1339 13.8577C13.2288 13.7796 13.3261 13.7015 13.4229 13.6147C13.4564 13.5846 13.4987 13.5659 13.5435 13.5616C13.5884 13.5572 13.6335 13.5674 13.6721 13.5905L14.5468 14.114C14.6297 14.168 14.7295 14.1899 14.8274 14.1755C14.9253 14.1611 15.0145 14.1114 15.0784 14.0358L15.3675 13.6882C15.4316 13.6126 15.4656 13.516 15.4629 13.4169C15.4602 13.3178 15.4211 13.2231 15.353 13.1511L14.6866 12.3827C14.657 12.3482 14.6393 12.305 14.6361 12.2596C14.633 12.2143 14.6445 12.1691 14.669 12.1308C14.7358 12.0249 14.7995 11.9132 14.8573 11.8011C14.879 11.761 14.9128 11.7287 14.9539 11.709C14.995 11.6892 15.0413 11.6829 15.0862 11.6909L16.0815 11.8851C16.178 11.9083 16.2797 11.8953 16.3671 11.8484C16.4546 11.8015 16.5217 11.724 16.5557 11.6308L16.71 11.2058C16.7446 11.1127 16.7437 11.0103 16.7077 10.9179C16.6717 10.8254 16.6031 10.7494 16.5147 10.7042L15.6241 10.2093C15.5846 10.187 15.5534 10.1526 15.5351 10.1111C15.5167 10.0697 15.5122 10.0234 15.5221 9.9792L15.5315 9.92959C15.5518 9.82061 15.5706 9.71748 15.5886 9.60772C15.5948 9.56299 15.615 9.52138 15.6463 9.48882C15.6775 9.45627 15.7183 9.43444 15.7628 9.42647L16.7663 9.26475C16.8647 9.25288 16.9554 9.20555 17.0214 9.13164C17.0874 9.05772 17.1242 8.96228 17.1249 8.86319V8.40576ZM6.09168 12.0776C6.043 12.1623 5.97493 12.2342 5.89307 12.2874C5.81121 12.3406 5.71788 12.3737 5.62077 12.3838C5.52365 12.3939 5.42552 12.3809 5.33442 12.3457C5.24333 12.3106 5.16188 12.2543 5.09676 12.1815C4.21674 11.2085 3.73083 9.94248 3.73387 8.63052C3.7369 7.31856 4.22865 6.0548 5.11317 5.08584C5.17862 5.01311 5.26042 4.95698 5.35183 4.92206C5.44323 4.88714 5.54163 4.87444 5.63891 4.88501C5.73618 4.89558 5.82955 4.92911 5.91133 4.98284C5.99311 5.03656 6.06095 5.10896 6.10926 5.19405L7.89246 8.33272C7.94601 8.42633 7.97418 8.5323 7.97418 8.64014C7.97418 8.74798 7.94601 8.85395 7.89246 8.94756L6.09168 12.0776ZM8.99988 13.9206C8.62816 13.9207 8.25747 13.8814 7.89402 13.8034C7.79934 13.7823 7.71098 13.7391 7.63609 13.6774C7.56119 13.6158 7.50189 13.5373 7.46297 13.4484C7.42405 13.3596 7.40662 13.2628 7.41208 13.1659C7.41754 13.0691 7.44575 12.9748 7.49442 12.8909L9.29129 9.76592C9.34534 9.67175 9.42328 9.59352 9.51725 9.53913C9.61121 9.48474 9.71787 9.45612 9.82645 9.45615H13.4257C13.5226 9.456 13.6182 9.47869 13.7048 9.52239C13.7913 9.56608 13.8664 9.62955 13.9238 9.70766C13.9813 9.78576 14.0195 9.87629 14.0354 9.97193C14.0514 10.0676 14.0445 10.1656 14.0155 10.2581C13.3323 12.38 11.3436 13.9206 8.99988 13.9206ZM9.29324 7.51826L7.51551 4.3878C7.46733 4.30373 7.43961 4.20951 7.43458 4.11275C7.42955 4.016 7.44736 3.91941 7.48657 3.83081C7.52577 3.74221 7.58528 3.66407 7.66027 3.60272C7.73526 3.54137 7.82363 3.49852 7.91824 3.47764C8.27391 3.40269 8.63641 3.36498 8.99988 3.36514C11.3436 3.36514 13.3323 4.90576 14.0143 7.02881C14.0434 7.12132 14.0502 7.21936 14.0343 7.31499C14.0183 7.41063 13.9801 7.50116 13.9226 7.57926C13.8652 7.65736 13.7902 7.72083 13.7036 7.76453C13.6171 7.80822 13.5214 7.83092 13.4245 7.83076H9.83074C9.72149 7.83098 9.61415 7.80216 9.51971 7.74725C9.42526 7.69234 9.34711 7.61331 9.29324 7.51826Z",
  fill: "currentcolor"
}, null, -1 /* HOISTED */);
var _hoisted_3 = [_hoisted_2];
function render(_ctx, _cache) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("svg", _hoisted_1, _hoisted_3);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/Document.vue?vue&type=template&id=8070683a":
/*!************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/Document.vue?vue&type=template&id=8070683a ***!
  \************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  width: "14",
  height: "19",
  viewBox: "0 0 14 19",
  fill: "currentcolor",
  xmlns: "http://www.w3.org/2000/svg"
};
var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M13.7188 8.39236H8.25C7.75272 8.39236 7.2758 8.19482 6.92417 7.84319C6.57254 7.49156 6.375 7.01465 6.375 6.51736V1.04861C6.375 1.00717 6.35854 0.967432 6.32924 0.938129C6.29993 0.908827 6.26019 0.892365 6.21875 0.892365H2.625C1.96196 0.892365 1.32607 1.15576 0.857233 1.6246C0.388392 2.09344 0.125 2.72932 0.125 3.39236V15.8924C0.125 16.5554 0.388392 17.1913 0.857233 17.6601C1.32607 18.129 1.96196 18.3924 2.625 18.3924H11.375C12.038 18.3924 12.6739 18.129 13.1428 17.6601C13.6116 17.1913 13.875 16.5554 13.875 15.8924V8.54861C13.875 8.50717 13.8585 8.46743 13.8292 8.43813C13.7999 8.40883 13.7602 8.39236 13.7188 8.39236ZM10.125 14.6424H3.875C3.70924 14.6424 3.55027 14.5765 3.43306 14.4593C3.31585 14.3421 3.25 14.1831 3.25 14.0174C3.25 13.8516 3.31585 13.6926 3.43306 13.5754C3.55027 13.4582 3.70924 13.3924 3.875 13.3924H10.125C10.2908 13.3924 10.4497 13.4582 10.5669 13.5754C10.6842 13.6926 10.75 13.8516 10.75 14.0174C10.75 14.1831 10.6842 14.3421 10.5669 14.4593C10.4497 14.5765 10.2908 14.6424 10.125 14.6424ZM10.125 11.5174H3.875C3.70924 11.5174 3.55027 11.4515 3.43306 11.3343C3.31585 11.2171 3.25 11.0581 3.25 10.8924C3.25 10.7266 3.31585 10.5676 3.43306 10.4504C3.55027 10.3332 3.70924 10.2674 3.875 10.2674H10.125C10.2908 10.2674 10.4497 10.3332 10.5669 10.4504C10.6842 10.5676 10.75 10.7266 10.75 10.8924C10.75 11.0581 10.6842 11.2171 10.5669 11.3343C10.4497 11.4515 10.2908 11.5174 10.125 11.5174Z",
  fill: "currentcolor"
}, null, -1 /* HOISTED */);
var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M13.3758 7.00916L7.7582 1.39158C7.74728 1.38072 7.73339 1.37334 7.71828 1.37035C7.70317 1.36736 7.68751 1.36891 7.67327 1.37479C7.65904 1.38068 7.64686 1.39064 7.63827 1.40343C7.62968 1.41622 7.62506 1.43126 7.625 1.44666V6.51736C7.625 6.68313 7.69085 6.8421 7.80806 6.95931C7.92527 7.07652 8.08424 7.14236 8.25 7.14236H13.3207C13.3361 7.1423 13.3511 7.13768 13.3639 7.12909C13.3767 7.12051 13.3867 7.10833 13.3926 7.09409C13.3985 7.07986 13.4 7.0642 13.397 7.04909C13.394 7.03398 13.3866 7.02009 13.3758 7.00916Z",
  fill: "currentcolor"
}, null, -1 /* HOISTED */);
var _hoisted_4 = [_hoisted_2, _hoisted_3];
function render(_ctx, _cache) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("svg", _hoisted_1, _hoisted_4);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/LogOut.vue?vue&type=template&id=4d2d84b2":
/*!**********************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/LogOut.vue?vue&type=template&id=4d2d84b2 ***!
  \**********************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  xmlns: "http://www.w3.org/2000/svg",
  width: "24",
  height: "24",
  viewBox: "0 0 24 24",
  fill: "none",
  stroke: "currentcolor",
  "stroke-width": "2",
  "stroke-linecap": "round",
  "stroke-linejoin": "round"
};
var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"
}, null, -1 /* HOISTED */);
var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("polyline", {
  points: "16 17 21 12 16 7"
}, null, -1 /* HOISTED */);
var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("line", {
  x1: "21",
  y1: "12",
  x2: "9",
  y2: "12"
}, null, -1 /* HOISTED */);
var _hoisted_5 = [_hoisted_2, _hoisted_3, _hoisted_4];
function render(_ctx, _cache) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("svg", _hoisted_1, _hoisted_5);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/People.vue?vue&type=template&id=542eff57":
/*!**********************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/People.vue?vue&type=template&id=542eff57 ***!
  \**********************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  width: "20",
  height: "15",
  viewBox: "0 0 20 15",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
};
var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M13.1243 7.64236C12.3212 7.64236 11.5447 7.28377 10.9368 6.63299C10.3458 5.99822 9.98489 5.15174 9.92122 4.25018C9.85325 3.28846 10.1466 2.40408 10.747 1.75955C11.3474 1.11502 12.1868 0.767365 13.1243 0.767365C14.0552 0.767365 14.897 1.12127 15.4954 1.76424C16.0997 2.41346 16.3939 3.29627 16.3259 4.24979C16.2607 5.15252 15.9001 5.99861 15.3103 6.6326C14.704 7.28377 13.9279 7.64236 13.1243 7.64236Z",
  fill: "currentcolor"
}, null, -1 /* HOISTED */);
var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M18.274 14.5174H7.97513C7.80954 14.5183 7.64597 14.4811 7.49698 14.4089C7.348 14.3366 7.21757 14.2311 7.11575 14.1006C7.00774 13.959 6.93316 13.7949 6.89758 13.6204C6.86199 13.4459 6.86634 13.2657 6.91028 13.0931C7.23919 11.7724 8.05403 10.6771 9.26653 9.92596C10.3427 9.25955 11.7126 8.89236 13.1243 8.89236C14.5638 8.89236 15.8978 9.24393 16.9802 9.90994C18.1954 10.6572 19.0115 11.7588 19.3388 13.0955C19.3822 13.2682 19.3861 13.4484 19.3501 13.6228C19.3141 13.7971 19.2392 13.9611 19.131 14.1025C19.0293 14.2325 18.8991 14.3375 18.7506 14.4094C18.602 14.4813 18.439 14.5182 18.274 14.5174Z",
  fill: "currentcolor"
}, null, -1 /* HOISTED */);
var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M5.74153 7.79861C4.36692 7.79861 3.15833 6.52049 3.04622 4.94979C2.99075 4.1451 3.24153 3.40096 3.74935 2.85526C4.25169 2.31502 4.96028 2.01736 5.74153 2.01736C6.52278 2.01736 7.22591 2.31658 7.73099 2.85994C8.2427 3.40994 8.4927 4.15252 8.43411 4.95057C8.322 6.52088 7.1138 7.79861 5.74153 7.79861Z",
  fill: "currentcolor"
}, null, -1 /* HOISTED */);
var _hoisted_5 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M8.30638 9.02713C7.61927 8.69119 6.72747 8.52322 5.74192 8.52322C4.59114 8.52322 3.47356 8.82322 2.59466 9.36776C1.59817 9.98612 0.927861 10.8865 0.657158 11.9736C0.617543 12.13 0.613796 12.2933 0.646197 12.4513C0.678599 12.6093 0.746311 12.758 0.844267 12.8861C0.937215 13.0054 1.05629 13.1019 1.19234 13.1679C1.32839 13.234 1.47778 13.2681 1.62903 13.2674H5.96497C6.03815 13.2674 6.10901 13.2417 6.16519 13.1948C6.22137 13.1479 6.25931 13.0827 6.27239 13.0107C6.27669 12.9861 6.28216 12.9615 6.28841 12.9373C6.61966 11.6068 7.39583 10.4826 8.5427 9.66307C8.58489 9.63266 8.61881 9.59221 8.64141 9.54538C8.66401 9.49855 8.67457 9.44682 8.67212 9.39488C8.66968 9.34293 8.65431 9.29242 8.62742 9.24792C8.60052 9.20342 8.56295 9.16633 8.5181 9.14002C8.45677 9.10408 8.38645 9.06619 8.30638 9.02713Z",
  fill: "currentcolor"
}, null, -1 /* HOISTED */);
var _hoisted_6 = [_hoisted_2, _hoisted_3, _hoisted_4, _hoisted_5];
function render(_ctx, _cache) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("svg", _hoisted_1, _hoisted_6);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/Table.vue?vue&type=template&id=dc2b3094":
/*!*********************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/Table.vue?vue&type=template&id=dc2b3094 ***!
  \*********************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  width: "16",
  height: "21",
  viewBox: "0 0 16 21",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
};
var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M13 20.6424H3C2.33718 20.6416 1.70172 20.378 1.23303 19.9093C0.764348 19.4406 0.500724 18.8052 0.5 18.1424V3.14236C0.500724 2.47955 0.764348 1.84408 1.23303 1.3754C1.70172 0.906713 2.33718 0.643088 3 0.642365H13C13.6628 0.643088 14.2983 0.906713 14.767 1.3754C15.2357 1.84408 15.4993 2.47955 15.5 3.14236V18.1424C15.4993 18.8052 15.2357 19.4406 14.767 19.9093C14.2983 20.378 13.6628 20.6416 13 20.6424ZM3 1.89236C2.66848 1.89236 2.35054 2.02406 2.11612 2.25848C1.8817 2.4929 1.75 2.81084 1.75 3.14236V18.1424C1.75 18.4739 1.8817 18.7918 2.11612 19.0262C2.35054 19.2607 2.66848 19.3924 3 19.3924H13C13.3315 19.3924 13.6495 19.2607 13.8839 19.0262C14.1183 18.7918 14.25 18.4739 14.25 18.1424V3.14236C14.25 2.81084 14.1183 2.4929 13.8839 2.25848C13.6495 2.02406 13.3315 1.89236 13 1.89236H3Z",
  "class": "fill-current",
  fill: "currentcolor"
}, null, -1 /* HOISTED */);
var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M13 0.642365C13.6628 0.643088 14.2983 0.906713 14.767 1.3754C15.2357 1.84408 15.4993 2.47955 15.5 3.14236V18.1424C15.4993 18.8052 15.2357 19.4406 14.767 19.9093C14.2983 20.378 13.6628 20.6416 13 20.6424H3C2.33718 20.6416 1.70172 20.378 1.23303 19.9093C0.764348 19.4406 0.500724 18.8052 0.5 18.1424V3.14236C0.500724 2.47955 0.764348 1.84408 1.23303 1.3754C1.70172 0.906713 2.33718 0.643088 3 0.642365H13ZM3 19.3924H13C13.3315 19.3924 13.6495 19.2607 13.8839 19.0262C14.1183 18.7918 14.25 18.4739 14.25 18.1424V3.14236C14.25 2.81084 14.1183 2.4929 13.8839 2.25848C13.6495 2.02406 13.3315 1.89236 13 1.89236H3C2.66848 1.89236 2.35054 2.02406 2.11612 2.25848C1.8817 2.4929 1.75 2.81084 1.75 3.14236V18.1424C1.75 18.4739 1.8817 18.7918 2.11612 19.0262C2.35054 19.2607 2.66848 19.3924 3 19.3924ZM3 18.7674C2.83424 18.7674 2.67527 18.7015 2.55806 18.5843C2.44085 18.4671 2.375 18.3081 2.375 18.1424V3.14236C2.375 2.9766 2.44085 2.81763 2.55806 2.70042C2.67527 2.58321 2.83424 2.51736 3 2.51736H13C13.1658 2.51736 13.3247 2.58321 13.4419 2.70042C13.5592 2.81763 13.625 2.9766 13.625 3.14236V18.1424C13.625 18.3081 13.5592 18.4671 13.4419 18.5843C13.3247 18.7015 13.1658 18.7674 13 18.7674H3Z",
  fill: "currentcolor"
}, null, -1 /* HOISTED */);
var _hoisted_4 = [_hoisted_2, _hoisted_3];
function render(_ctx, _cache) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("svg", _hoisted_1, _hoisted_4);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/TaskBoardTasks.vue?vue&type=template&id=0ad1c316":
/*!*******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/TaskBoardTasks.vue?vue&type=template&id=0ad1c316 ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "flex-1 bg-white rounded-tl-2xl px-8 py-12 overflow-y-auto"
};
var _hoisted_2 = {
  "class": "w-full flex justify-between items-center"
};
var _hoisted_3 = {
  "class": "text-3xl font-bold text-[#403937]"
};
var _hoisted_4 = ["src"];
var _hoisted_5 = {
  "class": "w-full min-h-[821px] mt-8 flex justify-between gap-2"
};
var _hoisted_6 = {
  "class": "w-full flex justify-between items-center"
};
var _hoisted_7 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h2", {
  "class": "font-bold text-xl text-[#403937]"
}, "A fazer", -1 /* HOISTED */);
var _hoisted_8 = ["src"];
var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h2", {
  "class": "font-bold text-xl text-[#403937]"
}, "Fazendo", -1 /* HOISTED */);
var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h2", {
  "class": "font-bold text-xl text-[#403937]"
}, "Feito", -1 /* HOISTED */);
var _hoisted_11 = {
  "class": "fixed top-0 bottom-0 left-0 right-0 bg-[#00000033] flex justify-center items-center"
};
var _hoisted_12 = {
  "class": "bg-white p-4 rounded w-full max-w-[500px]"
};
var _hoisted_13 = {
  "class": "w-full flex justify-between"
};
var _hoisted_14 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h2", {
  "class": "font-bold"
}, "Adicionar nova Tarefa", -1 /* HOISTED */);
var _hoisted_15 = ["src"];
var _hoisted_16 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "input-title",
  "class": "block my-2 text-sm font-semibold text-[#1E293B]"
}, "Tarefa", -1 /* HOISTED */);
var _hoisted_17 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "input-title",
  "class": "block my-2 text-sm font-semibold text-[#1E293B]"
}, "Descrição", -1 /* HOISTED */);
var _hoisted_18 = {
  "class": "w-full flex justify-end"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)($setup["Layout"], null, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("main", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("header", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", _hoisted_3, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.taskboard.title), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
        src: _ctx.loadImage($props.image),
        alt: "imagem de perfil",
        "class": "w-16 h-16"
      }, null, 8 /* PROPS */, _hoisted_4)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
        "class": "w-[368px]",
        onDrop: _cache[2] || (_cache[2] = function ($event) {
          return $setup.drop($event, 1);
        }),
        onDragover: _cache[3] || (_cache[3] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {}, ["prevent"])),
        onDragenter: _cache[4] || (_cache[4] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {}, ["prevent"]))
      }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_6, [_hoisted_7, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
        "arial-label": "Adicionar tarefa",
        "class": "bg-[#7C3AED] rounded hover:scale-95",
        onClick: _cache[0] || (_cache[0] = function ($event) {
          return $setup.openModal = true;
        })
      }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
        src: (__webpack_require__(/*! ~/images/plus.svg */ "./public/images/plus.svg")["default"]),
        alt: "Plus icon"
      }, null, 8 /* PROPS */, _hoisted_8)])]), ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($setup.taskToDo, function (task) {
        return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)($setup["Task"], {
          key: task.id,
          task: task,
          onDragStart: $setup.dragStart,
          onOnDelete: _cache[1] || (_cache[1] = function ($event) {
            return $setup.DeleteTask($event);
          })
        }, null, 8 /* PROPS */, ["task"]);
      }), 128 /* KEYED_FRAGMENT */))], 32 /* HYDRATE_EVENTS */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
        "class": "w-[368px]",
        onDrop: _cache[6] || (_cache[6] = function ($event) {
          return $setup.drop($event, 2);
        }),
        onDragover: _cache[7] || (_cache[7] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {}, ["prevent"])),
        onDragenter: _cache[8] || (_cache[8] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {}, ["prevent"]))
      }, [_hoisted_9, ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($setup.taskDoing, function (task) {
        return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)($setup["Task"], {
          key: task.id,
          task: task,
          onDragStart: $setup.dragStart,
          onOnDelete: _cache[5] || (_cache[5] = function ($event) {
            return $setup.DeleteTask($event);
          })
        }, null, 8 /* PROPS */, ["task"]);
      }), 128 /* KEYED_FRAGMENT */))], 32 /* HYDRATE_EVENTS */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
        "class": "w-[368px]",
        onDrop: _cache[10] || (_cache[10] = function ($event) {
          return $setup.drop($event, 3);
        }),
        onDragover: _cache[11] || (_cache[11] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {}, ["prevent"])),
        onDragenter: _cache[12] || (_cache[12] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {}, ["prevent"]))
      }, [_hoisted_10, ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($setup.taskDone, function (task) {
        return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)($setup["Task"], {
          key: task.id,
          task: task,
          onDragStart: $setup.dragStart,
          onOnDelete: _cache[9] || (_cache[9] = function ($event) {
            return $setup.DeleteTask($event);
          })
        }, null, 8 /* PROPS */, ["task"]);
      }), 128 /* KEYED_FRAGMENT */))], 32 /* HYDRATE_EVENTS */)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_12, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_13, [_hoisted_14, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
        "arial-label": "Close modal",
        onClick: _cache[13] || (_cache[13] = function ($event) {
          return $setup.closeModal();
        })
      }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
        src: (__webpack_require__(/*! ~/images/x.svg */ "./public/images/x.svg")["default"]),
        alt: "close icon"
      }, null, 8 /* PROPS */, _hoisted_15)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("form", {
        action: "#",
        method: "POST",
        onSubmit: _cache[17] || (_cache[17] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {}, ["prevent"]))
      }, [_hoisted_16, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["InputForm"], {
        type: "text",
        name: "title",
        placeholder: "Digite o titulo da terfa",
        modelValue: $setup.formInputTasks.title,
        "onUpdate:modelValue": _cache[14] || (_cache[14] = function ($event) {
          return $setup.formInputTasks.title = $event;
        }),
        error: $setup.formInputTasksErrors.title
      }, null, 8 /* PROPS */, ["modelValue", "error"]), _hoisted_17, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("textarea", {
        name: "description",
        "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["w-full h-[150px] border border-[#E2E8F0] rounded text-sm p-3 outline-none hover:border-[#7C3AED] focus:border-[#7C3AED]", {
          'border-red-400': $setup.formInputTasksErrors.description
        }]),
        "onUpdate:modelValue": _cache[15] || (_cache[15] = function ($event) {
          return $setup.formInputTasks.description = $event;
        })
      }, null, 2 /* CLASS */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.formInputTasks.description]]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
        "class": "text-xs text-red-400 mt-2"
      }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.formInputTasksErrors.description), 513 /* TEXT, NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vShow, $setup.formInputTasksErrors.description]]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_18, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
        "aria-label": "Botão para filtrar tarefas",
        "class": "flex justify-center align-items text-sm font-normal gap-2 text-white bg-[#7C3AED] p-3 w-[135px] rounded hover:scale-95",
        onClick: _cache[16] || (_cache[16] = function ($event) {
          return $setup.addNewTask();
        })
      }, " Adicionar ")])], 32 /* HYDRATE_EVENTS */)])], 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vShow, $setup.openModal]])];
    }),
    _: 1 /* STABLE */
  });
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Template/Layout.vue?vue&type=template&id=f0a72a5e":
/*!**************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Template/Layout.vue?vue&type=template&id=f0a72a5e ***!
  \**************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "w-full h-screen bg-[#7C3AED] flex pt-1"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["Menu"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderSlot)(_ctx.$slots, "default")]);
}

/***/ }),

/***/ "./public/images/logo.svg":
/*!********************************!*\
  !*** ./public/images/logo.svg ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("/images/logo.svg?7c989ee918fe2228180bbfeaede82ad3");

/***/ }),

/***/ "./public/images/plus.svg":
/*!********************************!*\
  !*** ./public/images/plus.svg ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("/images/plus.svg?31fb71dc263acb150774fe40eecf36cd");

/***/ }),

/***/ "./public/images/trash.svg":
/*!*********************************!*\
  !*** ./public/images/trash.svg ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("/images/trash.svg?999fbc01e370611dc19a2e3d921dfad9");

/***/ }),

/***/ "./public/images/x.svg":
/*!*****************************!*\
  !*** ./public/images/x.svg ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("/images/x.svg?82245c9a8a4dbba5e102990306a0a121");

/***/ }),

/***/ "./resources/js/Components/InputForm.vue":
/*!***********************************************!*\
  !*** ./resources/js/Components/InputForm.vue ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _InputForm_vue_vue_type_template_id_2f59aa1a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./InputForm.vue?vue&type=template&id=2f59aa1a */ "./resources/js/Components/InputForm.vue?vue&type=template&id=2f59aa1a");
/* harmony import */ var _InputForm_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./InputForm.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Components/InputForm.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_InputForm_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_InputForm_vue_vue_type_template_id_2f59aa1a__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Components/InputForm.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Components/Menu.vue":
/*!******************************************!*\
  !*** ./resources/js/Components/Menu.vue ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Menu_vue_vue_type_template_id_6b52e6ac__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Menu.vue?vue&type=template&id=6b52e6ac */ "./resources/js/Components/Menu.vue?vue&type=template&id=6b52e6ac");
/* harmony import */ var _Menu_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Menu.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Components/Menu.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Menu_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Menu_vue_vue_type_template_id_6b52e6ac__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Components/Menu.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Components/Task.vue":
/*!******************************************!*\
  !*** ./resources/js/Components/Task.vue ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Task_vue_vue_type_template_id_543dac60__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Task.vue?vue&type=template&id=543dac60 */ "./resources/js/Components/Task.vue?vue&type=template&id=543dac60");
/* harmony import */ var _Task_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Task.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Components/Task.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Task_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Task_vue_vue_type_template_id_543dac60__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Components/Task.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Icon/Config.vue":
/*!**************************************!*\
  !*** ./resources/js/Icon/Config.vue ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Config_vue_vue_type_template_id_393ebe8a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Config.vue?vue&type=template&id=393ebe8a */ "./resources/js/Icon/Config.vue?vue&type=template&id=393ebe8a");
/* harmony import */ var C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_Config_vue_vue_type_template_id_393ebe8a__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Icon/Config.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Icon/Document.vue":
/*!****************************************!*\
  !*** ./resources/js/Icon/Document.vue ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Document_vue_vue_type_template_id_8070683a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Document.vue?vue&type=template&id=8070683a */ "./resources/js/Icon/Document.vue?vue&type=template&id=8070683a");
/* harmony import */ var C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_Document_vue_vue_type_template_id_8070683a__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Icon/Document.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Icon/LogOut.vue":
/*!**************************************!*\
  !*** ./resources/js/Icon/LogOut.vue ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _LogOut_vue_vue_type_template_id_4d2d84b2__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./LogOut.vue?vue&type=template&id=4d2d84b2 */ "./resources/js/Icon/LogOut.vue?vue&type=template&id=4d2d84b2");
/* harmony import */ var C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_LogOut_vue_vue_type_template_id_4d2d84b2__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Icon/LogOut.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Icon/People.vue":
/*!**************************************!*\
  !*** ./resources/js/Icon/People.vue ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _People_vue_vue_type_template_id_542eff57__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./People.vue?vue&type=template&id=542eff57 */ "./resources/js/Icon/People.vue?vue&type=template&id=542eff57");
/* harmony import */ var C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_People_vue_vue_type_template_id_542eff57__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Icon/People.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Icon/Table.vue":
/*!*************************************!*\
  !*** ./resources/js/Icon/Table.vue ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Table_vue_vue_type_template_id_dc2b3094__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Table.vue?vue&type=template&id=dc2b3094 */ "./resources/js/Icon/Table.vue?vue&type=template&id=dc2b3094");
/* harmony import */ var C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_Table_vue_vue_type_template_id_dc2b3094__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Icon/Table.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/TaskBoardTasks.vue":
/*!***********************************************!*\
  !*** ./resources/js/Pages/TaskBoardTasks.vue ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _TaskBoardTasks_vue_vue_type_template_id_0ad1c316__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./TaskBoardTasks.vue?vue&type=template&id=0ad1c316 */ "./resources/js/Pages/TaskBoardTasks.vue?vue&type=template&id=0ad1c316");
/* harmony import */ var _TaskBoardTasks_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./TaskBoardTasks.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Pages/TaskBoardTasks.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_TaskBoardTasks_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_TaskBoardTasks_vue_vue_type_template_id_0ad1c316__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/TaskBoardTasks.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Template/Layout.vue":
/*!******************************************!*\
  !*** ./resources/js/Template/Layout.vue ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Layout_vue_vue_type_template_id_f0a72a5e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Layout.vue?vue&type=template&id=f0a72a5e */ "./resources/js/Template/Layout.vue?vue&type=template&id=f0a72a5e");
/* harmony import */ var _Layout_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Layout.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Template/Layout.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_edmar_Documents_kanban_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Layout_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Layout_vue_vue_type_template_id_f0a72a5e__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Template/Layout.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Components/InputForm.vue?vue&type=script&setup=true&lang=js":
/*!**********************************************************************************!*\
  !*** ./resources/js/Components/InputForm.vue?vue&type=script&setup=true&lang=js ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_InputForm_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_InputForm_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./InputForm.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/InputForm.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Components/Menu.vue?vue&type=script&setup=true&lang=js":
/*!*****************************************************************************!*\
  !*** ./resources/js/Components/Menu.vue?vue&type=script&setup=true&lang=js ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Menu_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Menu_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Menu.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Menu.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Components/Task.vue?vue&type=script&setup=true&lang=js":
/*!*****************************************************************************!*\
  !*** ./resources/js/Components/Task.vue?vue&type=script&setup=true&lang=js ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Task_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Task_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Task.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Task.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/TaskBoardTasks.vue?vue&type=script&setup=true&lang=js":
/*!**********************************************************************************!*\
  !*** ./resources/js/Pages/TaskBoardTasks.vue?vue&type=script&setup=true&lang=js ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_TaskBoardTasks_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_TaskBoardTasks_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./TaskBoardTasks.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/TaskBoardTasks.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Template/Layout.vue?vue&type=script&setup=true&lang=js":
/*!*****************************************************************************!*\
  !*** ./resources/js/Template/Layout.vue?vue&type=script&setup=true&lang=js ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Layout_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Layout_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Layout.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Template/Layout.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Components/InputForm.vue?vue&type=template&id=2f59aa1a":
/*!*****************************************************************************!*\
  !*** ./resources/js/Components/InputForm.vue?vue&type=template&id=2f59aa1a ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_InputForm_vue_vue_type_template_id_2f59aa1a__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_InputForm_vue_vue_type_template_id_2f59aa1a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./InputForm.vue?vue&type=template&id=2f59aa1a */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/InputForm.vue?vue&type=template&id=2f59aa1a");


/***/ }),

/***/ "./resources/js/Components/Menu.vue?vue&type=template&id=6b52e6ac":
/*!************************************************************************!*\
  !*** ./resources/js/Components/Menu.vue?vue&type=template&id=6b52e6ac ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Menu_vue_vue_type_template_id_6b52e6ac__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Menu_vue_vue_type_template_id_6b52e6ac__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Menu.vue?vue&type=template&id=6b52e6ac */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Menu.vue?vue&type=template&id=6b52e6ac");


/***/ }),

/***/ "./resources/js/Components/Task.vue?vue&type=template&id=543dac60":
/*!************************************************************************!*\
  !*** ./resources/js/Components/Task.vue?vue&type=template&id=543dac60 ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Task_vue_vue_type_template_id_543dac60__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Task_vue_vue_type_template_id_543dac60__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Task.vue?vue&type=template&id=543dac60 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Task.vue?vue&type=template&id=543dac60");


/***/ }),

/***/ "./resources/js/Icon/Config.vue?vue&type=template&id=393ebe8a":
/*!********************************************************************!*\
  !*** ./resources/js/Icon/Config.vue?vue&type=template&id=393ebe8a ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Config_vue_vue_type_template_id_393ebe8a__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Config_vue_vue_type_template_id_393ebe8a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Config.vue?vue&type=template&id=393ebe8a */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/Config.vue?vue&type=template&id=393ebe8a");


/***/ }),

/***/ "./resources/js/Icon/Document.vue?vue&type=template&id=8070683a":
/*!**********************************************************************!*\
  !*** ./resources/js/Icon/Document.vue?vue&type=template&id=8070683a ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Document_vue_vue_type_template_id_8070683a__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Document_vue_vue_type_template_id_8070683a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Document.vue?vue&type=template&id=8070683a */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/Document.vue?vue&type=template&id=8070683a");


/***/ }),

/***/ "./resources/js/Icon/LogOut.vue?vue&type=template&id=4d2d84b2":
/*!********************************************************************!*\
  !*** ./resources/js/Icon/LogOut.vue?vue&type=template&id=4d2d84b2 ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_LogOut_vue_vue_type_template_id_4d2d84b2__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_LogOut_vue_vue_type_template_id_4d2d84b2__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./LogOut.vue?vue&type=template&id=4d2d84b2 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/LogOut.vue?vue&type=template&id=4d2d84b2");


/***/ }),

/***/ "./resources/js/Icon/People.vue?vue&type=template&id=542eff57":
/*!********************************************************************!*\
  !*** ./resources/js/Icon/People.vue?vue&type=template&id=542eff57 ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_People_vue_vue_type_template_id_542eff57__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_People_vue_vue_type_template_id_542eff57__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./People.vue?vue&type=template&id=542eff57 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/People.vue?vue&type=template&id=542eff57");


/***/ }),

/***/ "./resources/js/Icon/Table.vue?vue&type=template&id=dc2b3094":
/*!*******************************************************************!*\
  !*** ./resources/js/Icon/Table.vue?vue&type=template&id=dc2b3094 ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Table_vue_vue_type_template_id_dc2b3094__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Table_vue_vue_type_template_id_dc2b3094__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Table.vue?vue&type=template&id=dc2b3094 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Icon/Table.vue?vue&type=template&id=dc2b3094");


/***/ }),

/***/ "./resources/js/Pages/TaskBoardTasks.vue?vue&type=template&id=0ad1c316":
/*!*****************************************************************************!*\
  !*** ./resources/js/Pages/TaskBoardTasks.vue?vue&type=template&id=0ad1c316 ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_TaskBoardTasks_vue_vue_type_template_id_0ad1c316__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_TaskBoardTasks_vue_vue_type_template_id_0ad1c316__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./TaskBoardTasks.vue?vue&type=template&id=0ad1c316 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/TaskBoardTasks.vue?vue&type=template&id=0ad1c316");


/***/ }),

/***/ "./resources/js/Template/Layout.vue?vue&type=template&id=f0a72a5e":
/*!************************************************************************!*\
  !*** ./resources/js/Template/Layout.vue?vue&type=template&id=f0a72a5e ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Layout_vue_vue_type_template_id_f0a72a5e__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Layout_vue_vue_type_template_id_f0a72a5e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Layout.vue?vue&type=template&id=f0a72a5e */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Template/Layout.vue?vue&type=template&id=f0a72a5e");


/***/ })

}]);