import Core from './core/core';

export default class Enlink extends Core {

    constructor () {
        super()
    }
}

$(() => {
   window.Enlink = new Enlink();
});
