import { Controller } from "stimulus"

const HIDDEN_CLASS = 'hidden';

export default class extends Controller {
    static targets = ["menu"];

    isShown() {
        for(const targetEl of this.menuTargets) {
            return targetEl.classList.contains(HIDDEN_CLASS);
        }
    }

    setShown(enabled) {
        for(const targetEl of this.menuTargets) {
            this.setClass(targetEl, HIDDEN_CLASS, enabled);
        }
    }

    setClass(element, className, enabled) {
        if(enabled) {
            element.classList.add(className);
        } else {
            element.classList.remove(className);
        }
    }

    toggle() {
        this.setShown(!this.isShown());
    }
}