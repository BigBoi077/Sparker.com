export function getOptionDiv(optionNumber) {
    return `<div class="columns">
                    <div class="column is-11">
                        <input id="title" name="options[]" class="input" type="text" placeholder="Dragon fruit">
                    </div>
                    <div class="column d-flex justify-content-center">
                        <button type="button" class="button is-danger remove-button" data-option-target="option-${optionNumber}">
                            <span class="icon is-small">
                              <i class="fas fa-minus-circle"></i>
                            </span>
                        </button>
                    </div>
                </div>`
}