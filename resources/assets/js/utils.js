
import moment from 'moment'

export function alert(message, level = 'success', ms = 3000) {
    window.$eventHub.$emit('alert', { level, message, ms })
}

export function trigger(event, obj) {
    window.$eventHub.$emit(event, obj)
}

export function _$(selector) {
    return document.querySelector(selector)
}

export function $$(selector) {
    return document.querySelectorAll(selector)
}

export function objectClone(obj) {
    return JSON.parse(JSON.stringify(obj))
}

export function arrayClone(arr) {
    return (objectClone({ arr })).arr
}

export function clone(val) {

    if (Array.isArray(val)) {
        return arrayClone(val)
    }

    if (val && (typeof val === 'object')) {
        return objectClone(val)
    }

    if (typeof val === 'function') {
        throw new ReferenceError('clone method can not clone function')
    }

    return val
}

export function momentUTC8(timestamp) {
    return moment.utc(timestamp).utcOffset('+0800')
}
