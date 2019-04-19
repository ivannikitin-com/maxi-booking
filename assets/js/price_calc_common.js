'use strict';
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : new P(function (resolve) { resolve(result.value); }).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (this && this.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (_) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
};
/* start Kludge for promise */
(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory() :
        typeof define === 'function' && define.amd ? define(factory) :
            (factory());
}(this, (function () {
    'use strict';
    /**
     * @this {Promise}
     */
    function finallyConstructor(callback) {
        var constructor = this.constructor;
        return this.then(function (value) {
            return constructor.resolve(callback()).then(function () {
                return value;
            });
        }, function (reason) {
            return constructor.resolve(callback()).then(function () {
                return constructor.reject(reason);
            });
        });
    }
    // Store setTimeout reference so promise-polyfill will be unaffected by
    // other code modifying setTimeout (like sinon.useFakeTimers())
    var setTimeoutFunc = setTimeout;
    function noop() { }
    // Polyfill for Function.prototype.bind
    function bind(fn, thisArg) {
        return function () {
            fn.apply(thisArg, arguments);
        };
    }
    /**
     * @constructor
     * @param {Function} fn
     */
    function Promise(fn) {
        if (!(this instanceof Promise))
            throw new TypeError('Promises must be constructed via new');
        if (typeof fn !== 'function')
            throw new TypeError('not a function');
        /** @type {!number} */
        this._state = 0;
        /** @type {!boolean} */
        this._handled = false;
        /** @type {Promise|undefined} */
        this._value = undefined;
        /** @type {!Array<!Function>} */
        this._deferreds = [];
        doResolve(fn, this);
    }
    function handle(self, deferred) {
        while (self._state === 3) {
            self = self._value;
        }
        if (self._state === 0) {
            self._deferreds.push(deferred);
            return;
        }
        self._handled = true;
        Promise._immediateFn(function () {
            var cb = self._state === 1 ? deferred.onFulfilled : deferred.onRejected;
            if (cb === null) {
                (self._state === 1 ? resolve : reject)(deferred.promise, self._value);
                return;
            }
            var ret;
            try {
                ret = cb(self._value);
            }
            catch (e) {
                reject(deferred.promise, e);
                return;
            }
            resolve(deferred.promise, ret);
        });
    }
    function resolve(self, newValue) {
        try {
            // Promise Resolution Procedure: https://github.com/promises-aplus/promises-spec#the-promise-resolution-procedure
            if (newValue === self)
                throw new TypeError('A promise cannot be resolved with itself.');
            if (newValue &&
                (typeof newValue === 'object' || typeof newValue === 'function')) {
                var then = newValue.then;
                if (newValue instanceof Promise) {
                    self._state = 3;
                    self._value = newValue;
                    finale(self);
                    return;
                }
                else if (typeof then === 'function') {
                    doResolve(bind(then, newValue), self);
                    return;
                }
            }
            self._state = 1;
            self._value = newValue;
            finale(self);
        }
        catch (e) {
            reject(self, e);
        }
    }
    function reject(self, newValue) {
        self._state = 2;
        self._value = newValue;
        finale(self);
    }
    function finale(self) {
        if (self._state === 2 && self._deferreds.length === 0) {
            Promise._immediateFn(function () {
                if (!self._handled) {
                    Promise._unhandledRejectionFn(self._value);
                }
            });
        }
        for (var i = 0, len = self._deferreds.length; i < len; i++) {
            handle(self, self._deferreds[i]);
        }
        self._deferreds = null;
    }
    /**
     * @constructor
     */
    function Handler(onFulfilled, onRejected, promise) {
        this.onFulfilled = typeof onFulfilled === 'function' ? onFulfilled : null;
        this.onRejected = typeof onRejected === 'function' ? onRejected : null;
        this.promise = promise;
    }
    /**
     * Take a potentially misbehaving resolver function and make sure
     * onFulfilled and onRejected are only called once.
     *
     * Makes no guarantees about asynchrony.
     */
    function doResolve(fn, self) {
        var done = false;
        try {
            fn(function (value) {
                if (done)
                    return;
                done = true;
                resolve(self, value);
            }, function (reason) {
                if (done)
                    return;
                done = true;
                reject(self, reason);
            });
        }
        catch (ex) {
            if (done)
                return;
            done = true;
            reject(self, ex);
        }
    }
    Promise.prototype['catch'] = function (onRejected) {
        return this.then(null, onRejected);
    };
    Promise.prototype.then = function (onFulfilled, onRejected) {
        // @ts-ignore
        var prom = new this.constructor(noop);
        handle(this, new Handler(onFulfilled, onRejected, prom));
        return prom;
    };
    Promise.prototype['finally'] = finallyConstructor;
    Promise.all = function (arr) {
        return new Promise(function (resolve, reject) {
            if (!arr || typeof arr.length === 'undefined')
                throw new TypeError('Promise.all accepts an array');
            var args = Array.prototype.slice.call(arr);
            if (args.length === 0)
                return resolve([]);
            var remaining = args.length;
            function res(i, val) {
                try {
                    if (val && (typeof val === 'object' || typeof val === 'function')) {
                        var then = val.then;
                        if (typeof then === 'function') {
                            then.call(val, function (val) {
                                res(i, val);
                            }, reject);
                            return;
                        }
                    }
                    args[i] = val;
                    if (--remaining === 0) {
                        resolve(args);
                    }
                }
                catch (ex) {
                    reject(ex);
                }
            }
            for (var i = 0; i < args.length; i++) {
                res(i, args[i]);
            }
        });
    };
    Promise.resolve = function (value) {
        if (value && typeof value === 'object' && value.constructor === Promise) {
            return value;
        }
        return new Promise(function (resolve) {
            resolve(value);
        });
    };
    Promise.reject = function (value) {
        return new Promise(function (resolve, reject) {
            reject(value);
        });
    };
    Promise.race = function (values) {
        return new Promise(function (resolve, reject) {
            for (var i = 0, len = values.length; i < len; i++) {
                values[i].then(resolve, reject);
            }
        });
    };
    // Use polyfill for setImmediate for performance gains
    Promise._immediateFn =
        (typeof setImmediate === 'function' &&
            function (fn) {
                setImmediate(fn);
            }) ||
        function (fn) {
            setTimeoutFunc(fn, 0);
        };
    Promise._unhandledRejectionFn = function _unhandledRejectionFn(err) {
        if (typeof console !== 'undefined' && console) {
            console.warn('Possible Unhandled Promise Rejection:', err); // eslint-disable-line no-console
        }
    };
    /** @suppress {undefinedVars} */
    var globalNS = (function () {
        // the only reliable means to get the global object is
        // `Function('return this')()`
        // However, this causes CSP violations in Chrome apps.
        if (typeof self !== 'undefined') {
            return self;
        }
        if (typeof window !== 'undefined') {
            return window;
        }
        if (typeof global !== 'undefined') {
            return global;
        }
        throw new Error('unable to locate global object');
    })();
    if (!('Promise' in globalNS)) {
        globalNS['Promise'] = Promise;
    }
    else if (!globalNS.Promise.prototype['finally']) {
        globalNS.Promise.prototype['finally'] = finallyConstructor;
    }
})));
/* end Kludge for promise */
var Billing = /** @class */ (function () {
    function Billing() {
    }
    // public static token: string = 'Token 4780dc68d1c3c94c3fc80fac789fd668b20c4c43';
    Billing.urlForCountries = function (location) {
        return Billing.prefixUrl + location + '/countries/?page_size=999&ordering=name&is_former=false&with_tld=true';
    };
    Billing.urlForPrices = function () {
        // return 'http://localhost:9099/';
        return Billing.prefixUrl + 'en/services/calc/';
    };
    Billing.prefixUrl = 'https://billing.maxi-booking.com/';
    // private static prefixUrl: string = 'http://billing-dev.maxi-booking.com/';
    Billing.token = 'Token 278131747b33a07cfbb88cb4b3f2360785cc6204';
    return Billing;
}());
var LocationFromIp = /** @class */ (function () {
    function LocationFromIp(ajax) {
        if (ajax === void 0) { ajax = jQuery.ajax; }
        this.ajax = ajax;
        this.LOCATION_DEFAULT = 'ie';
        this.LOCATION_RU = 'ru';
        this.cacheDataIp = new CachePriceData('mbh_dataIp_');
    }
    LocationFromIp.isRuDomain = function () {
        return /ru/.test(window.location.hostname);
    };
    LocationFromIp.prototype.get = function () {
        return __awaiter(this, void 0, void 0, function () {
            var locale, key, e_1;
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0:
                        key = this.cacheDataIp.getKey(999);
                        if (!this.cacheDataIp.isset(key)) return [3 /*break*/, 1];
                        locale = this.cacheDataIp.get(key);
                        return [3 /*break*/, 5];
                    case 1:
                        _a.trys.push([1, 3, , 4]);
                        return [4 /*yield*/, this.ajax('https://ipapi.co/country/')];
                    case 2:
                        locale = _a.sent();
                        if (typeof locale !== "string") {
                            throw 'not string';
                        }
                        locale = locale.toLowerCase();
                        return [3 /*break*/, 4];
                    case 3:
                        e_1 = _a.sent();
                        locale = LocationFromIp.isRuDomain() ? this.LOCATION_RU : this.LOCATION_DEFAULT;
                        return [3 /*break*/, 4];
                    case 4:
                        this.cacheDataIp.set(key, locale);
                        _a.label = 5;
                    case 5: return [2 /*return*/, locale];
                }
            });
        });
    };
    return LocationFromIp;
}());
var SelectCountry = /** @class */ (function () {
    function SelectCountry(locationFromIp) {
        this.locationFromIp = locationFromIp;
        this.LOCATION_RU = 'ru';
        this.LOCATION_EN = 'en';
        this.billingToken = Billing.token;
        this.location = /ru/.test(window.location.hostname) ? this.LOCATION_RU : this.LOCATION_EN;
        this.cacheDataOption = new CachePriceData('mbh_selectOptions_');
    }
    SelectCountry.prototype.renderOptions = function () {
        return __awaiter(this, void 0, void 0, function () {
            var _a;
            return __generator(this, function (_b) {
                switch (_b.label) {
                    case 0:
                        _a = document.querySelector('#' + SelectCountry.cssSelectId);
                        return [4 /*yield*/, this.getOptions()];
                    case 1:
                        _a.innerHTML = _b.sent();
                        return [2 /*return*/];
                }
            });
        });
    };
    SelectCountry.prototype.getOptions = function () {
        return __awaiter(this, void 0, void 0, function () {
            var keyCache, string, options, writeInCache, rawData, e_2, locationIp_1;
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0:
                        keyCache = this.cacheDataOption
                        .getKey(this.location === this.LOCATION_RU ? 1 : 7) + '_' + this.location, string = '';
                        if (!this.cacheDataOption.isset(keyCache)) return [3 /*break*/, 1];
                        string = this.cacheDataOption.get(keyCache);
                        return [3 /*break*/, 7];
                    case 1:
                        options = void 0, writeInCache = true;
                        _a.label = 2;
                    case 2:
                        _a.trys.push([2, 4, , 5]);
                        return [4 /*yield*/, this.getCountryFromBilling()];
                    case 3:
                        rawData = _a.sent();
                        options = rawData.results;
                        return [3 /*break*/, 5];
                    case 4:
                        e_2 = _a.sent();
                        writeInCache = false;
                        if (this.location === this.LOCATION_RU) {
                            options = this.getRuOtions();
                        }
                        else {
                            options = this.getAnotherOptions();
                        }
                        return [3 /*break*/, 5];
                    case 5: return [4 /*yield*/, this.locationFromIp.get()];
                    case 6:
                        locationIp_1 = _a.sent();
                        options.forEach(function (data) {
                            string += '<option value="' + data.tld + '"';
                            if (locationIp_1 === data.tld) {
                                string += ' selected';
                            }
                            string += '>' + data.name + '</option>';
                        });
                        if (writeInCache) {
                            this.cacheDataOption.set(keyCache, string);
                        }
                        _a.label = 7;
                    case 7: return [2 /*return*/, string];
                }
            });
        });
    };
    SelectCountry.prototype.getCountryFromBilling = function () {
        return jQuery.ajax({
            url: Billing.urlForCountries(this.location),
            crossDomain: true,
            headers: { 'Authorization': this.billingToken }
        });
    };
    SelectCountry.prototype.getRuOtions = function () {
        return [
            { name: 'Российская Федерация', tld: 'ru' },
            { name: 'Ирландия', tld: 'ie' },
            { name: 'Канада', tld: 'ca' },
        ];
    };
    SelectCountry.prototype.getAnotherOptions = function () {
        return [
            { name: 'Russian Federation', tld: 'ru' },
            { name: 'Ireland', tld: 'ie' },
            { name: 'Canada', tld: 'ca' },
        ];
    };
    SelectCountry.cssSelectId = 'select_country';
    return SelectCountry;
}());
var PriceData = /** @class */ (function () {
    function PriceData(locationFromIp, ajax) {
        if (ajax === void 0) { ajax = jQuery.ajax; }
        this.locationFromIp = locationFromIp;
        this.ajax = ajax;
        this.billingToken = Billing.token;
        this.cssClassSizeRuBig = 'price-calc__wrap-big';
        this.cssClassSizeEnBig = 'price-calc__wrap-big-en';
        this.cssClassSizeEnMiddle = 'price-calc__wrap-middle-en';
        this.LOCATION_DEFAULT = 'ie';
        this.LOCATION_RU = 'ru';
        this.calcWrap = document.querySelector('.price-calc__wrap');
        this.currency = {
            'RUB': '&#63266;',
            'EUR': '&#63272;',
            'USD': '&#63268;',
            'JPY': '&#63271;',
            'GBR': '&#63269;',
            'CAD': '&#63268;',
            'ERROR': '&#10227',
        };
        this.stubError = [
            { price: 'error', period: 1, price_currency: 'ERROR' },
            { price: 'error', period: 6, price_currency: 'ERROR' },
            { price: 'error', period: 12, price_currency: 'ERROR' }
        ];
        this.stubLessThenOne = [
            { price: '-', period: 1, price_currency: 'ERROR' },
            { price: '-', period: 6, price_currency: 'ERROR' },
            { price: '-', period: 12, price_currency: 'ERROR' }
        ];
        this.fractionDigits = LocationFromIp.isRuDomain() ? 0 : 2;
    }
    PriceData.prototype.init = function () {
        return __awaiter(this, void 0, void 0, function () {
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0: return [4 /*yield*/, this.setLocale()];
                    case 1:
                        _a.sent();
                        this.cachePriceData = new CachePriceData();
                        return [2 /*return*/, null];
                }
            });
        });
    };
    PriceData.prototype.setLocale = function (locale) {
        if (locale === void 0) { locale = null; }
        return __awaiter(this, void 0, void 0, function () {
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0:
                        if (!(locale === null)) return [3 /*break*/, 2];
                        return [4 /*yield*/, this.locationFromIp.get()];
                    case 1:
                        locale = _a.sent();
                        _a.label = 2;
                    case 2:
                        this.locale = locale !== undefined ? locale : this.LOCATION_DEFAULT;
                        return [2 /*return*/, this.locale];
                }
            });
        });
    };
    PriceData.prototype.getHeaders = function () {
        return {
            'Authorization': this.billingToken
        };
    };
    PriceData.prototype.getUrl = function (quantity, locale) {
        return Billing.urlForPrices() + '?quantity=' + quantity + '&country=' + locale;
    };
    PriceData.prototype.keyForCache = function () {
        return this.cachePriceData.getKey(this.quantity) + '_' + this.locale;
    };
    PriceData.prototype.changeStyle = function () {
        if (this.locale == this.LOCATION_RU) {
            if (this.quantity > 130) {
                this.calcWrap.classList.add(this.cssClassSizeRuBig);
            }
            else {
                this.calcWrap.classList.remove(this.cssClassSizeRuBig);
            }
        }
        else {
            if (this.quantity > 5760) {
                this.calcWrap.classList.add(this.cssClassSizeEnBig);
            }
            else if (this.quantity > 520) {
                this.calcWrap.classList.add(this.cssClassSizeEnMiddle);
            }
            else {
                this.calcWrap.classList.remove(this.cssClassSizeEnBig);
            }
        }
    };
    PriceData.prototype.get = function (numOfRooms) {
        return __awaiter(this, void 0, void 0, function () {
            var data, response, e_3;
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0:
                        this.quantity = numOfRooms;
                        if (this.quantity < 1) {
                            return [2 /*return*/, this.renderNewPrice(this.stubLessThenOne)];
                        }
                        this.changeStyle();
                        if (!this.cachePriceData.isset(this.keyForCache())) return [3 /*break*/, 1];
                        this.renderNewPrice(this.cachePriceData.get(this.keyForCache()));
                        return [3 /*break*/, 6];
                    case 1:
                        data = this.stubError;
                        _a.label = 2;
                    case 2:
                        _a.trys.push([2, 4, , 5]);
                        return [4 /*yield*/, this.ajax({
                            url: this.getUrl(this.quantity, this.locale),
                            crossDomain: true,
                            headers: this.getHeaders()
                        })];
                    case 3:
                        response = _a.sent();
                        if (response.status === true && response.prices !== undefined) {
                            this.cachePriceData.set(this.keyForCache(), response.prices.map(function (value) {
                                // value.price = parseInt(value.price);
                                value.period = parseInt(value.period);
                                return value;
                            }));
                            data = this.cachePriceData.get(this.keyForCache());
                        }
                        return [3 /*break*/, 5];
                    case 4:
                        e_3 = _a.sent();
                        return [3 /*break*/, 5];
                    case 5:
                        this.renderNewPrice(data);
                        _a.label = 6;
                    case 6: return [2 /*return*/];
                }
            });
        });
    };
    PriceData.prototype.renderNewPrice = function (prices) {
        var _this = this;
        var currency = this.currency['EUR'];
        prices.forEach(function (value) {
            var sumSpan = 'summ' + value.period;
            var priceSpan = 'price' + value.period;
            var priceTotalSrt;
            var priceForMonthStr;
            if (typeof value.price === 'number') {
                priceTotalSrt = value.price.toFixed(_this.fractionDigits);
                priceForMonthStr = (priceTotalSrt / value.period).toFixed(_this.fractionDigits);
            }
            else {
                priceTotalSrt = priceForMonthStr = value.price;
            }
            if (_this.currency[value.price_currency] !== undefined) {
                currency = _this.currency[value.price_currency];
            }
            jQuery('span[id=' + priceSpan + ']')
            .text(priceForMonthStr.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 '))
            .closest('.price-calc__price')
            .find('sup')
            .html(currency);
            jQuery('span[id=' + sumSpan + ']').text(priceTotalSrt.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 '));
        }, this);
    };
    return PriceData;
}());
var CachePriceData = /** @class */ (function () {
    function CachePriceData(prefix) {
        if (prefix === void 0) { prefix = 'dataPrice_'; }
        this.prefix = prefix;
        this.storageTime = 3600000; // 4 hours
        this.currentStorage = localStorage;
    }
    CachePriceData.prototype.getKey = function (numberOfRoom) {
        return this.prefix + numberOfRoom;
    };
    CachePriceData.prototype.get = function (rawKey) {
        return JSON.parse(this.currentStorage.getItem(this.addLocaleForKey(rawKey)));
    };
    CachePriceData.prototype.set = function (rawKey, value) {
        this.currentStorage.setItem(this.addLocaleForKey(rawKey), JSON.stringify(value));
    };
    CachePriceData.prototype.isset = function (rawKey) {
        this.time();
        return this.currentStorage.getItem(this.addLocaleForKey(rawKey)) !== null;
    };
    CachePriceData.prototype.addLocaleForKey = function (rawKey) {
        return rawKey;
    };
    CachePriceData.prototype.keyForTimer = function () {
        return this.prefix + 'timer';
    };
    CachePriceData.prototype.setTime = function () {
        this.currentStorage.setItem(this.keyForTimer(), ((new Date()).getTime()).toString());
    };
    CachePriceData.prototype.time = function () {
        if (this.currentStorage.getItem(this.keyForTimer()) === null) {
            this.setTime();
        }
        else if (!this.isActualCache()) {
            this.clearCache();
        }
    };
    CachePriceData.prototype.isActualCache = function () {
        var cacheTime = parseInt(this.currentStorage.getItem(this.keyForTimer()));
        var currentTime = (new Date()).getTime();
        return currentTime - cacheTime < this.storageTime;
    };
    CachePriceData.prototype.clearCache = function () {
        var cacheItem = [];
        for (var i = 0; i < this.currentStorage.length; i++) {
            if (this.currentStorage.key(i).search(this.prefix) !== -1) {
                cacheItem.push(this.currentStorage.key(i));
            }
        }
        cacheItem.forEach(function (value) {
            this.removeItem(value);
        }, this.currentStorage);
    };
    return CachePriceData;
}());
window.addEventListener('load', function (e) {
    var _this = this;
    var location = new LocationFromIp(), priceData = new PriceData(location), selectOptions = new SelectCountry(location);
    selectOptions.renderOptions();
    var number = document.querySelector('#NumberOfRooms');
    number.value = (1).toString();
    (function () { return __awaiter(_this, void 0, void 0, function () {
        function change() {
            if (number.value === '' || number.value.search('[\\D]') != -1) {
                priceData.get(0);
                return;
            }
            var value = parseInt(number.value);
            if (value > 10000) {
                value = 10000;
            }
            priceData.get(value);
        }
        var select, timer;
        return __generator(this, function (_a) {
            switch (_a.label) {
                case 0: return [4 /*yield*/, priceData.init()];
                case 1:
                    _a.sent();
                    select = document.querySelector('#' + SelectCountry.cssSelectId);
                    priceData.get(number.value);
                    number.addEventListener('click', function () {
                        this.value = '';
                    });
                    number.addEventListener('keyup', function (ev) {
                        clearTimeout(timer);
                        timer = setTimeout(change, 400);
                    });
                    number.addEventListener('mouseup', function (ev) {
                        change();
                    });
                    select.addEventListener('change', function () {
                        priceData.setLocale(this.value);
                        change();
                    });
                    return [2 /*return*/];
            }
        });
    }); })();
});
