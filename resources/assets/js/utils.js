
export function alert(message, level = 'default', ms = 3000) {
    window.$eventHub.$emit('alert', { level, message, ms })
}
