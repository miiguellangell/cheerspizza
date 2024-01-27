/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');


$(document).ready(function () {
    $('.btn-number').click(function(e){
        e.preventDefault();
        
        var fieldName = $(this).attr('data-field');
        var type = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        
        if (!isNaN(currentVal)) {
            if(type === 'minus') {
                if(currentVal > parseInt(input.attr('min'))) {
                    input.val(currentVal - 1).change();
                }
                if(currentVal - 1 == input.attr('min')) {
                    $(this).attr('disabled', true);
                }
            } else if(type === 'plus') {
                if(currentVal < parseInt(input.attr('max'))) {
                    input.val(currentVal + 1).change();
                }
                if(currentVal + 1 == input.attr('max')) {
                    $(this).attr('disabled', true);
                }
            }
        } else {
            input.val(input.attr('min'));
        }
    });
    
    $('.input-number').change(function() {
        var minValue = parseInt($(this).attr('min'));
        var maxValue = parseInt($(this).attr('max'));
        var valueCurrent = parseInt($(this).val());
        var name = $(this).attr('name');

        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled');
        } else {
            alert('Lo siento, se alcanzó el valor mínimo.');
            $(this).val($(this).data('oldValue'));
        }

        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled');
        } else {
            alert('Lo siento, se alcanzó el valor máximo.');
            $(this).val($(this).data('oldValue'));
        }
    });
    
    $(".input-number").focusin(function(){
        $(this).data('oldValue', $(this).val());
    });

    $(".input-number").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            (e.keyCode == 65 && e.ctrlKey === true) || 
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});


$(document).ready(function () {
    function updateResult() {
        var peq = parseInt($("input[name='ProductoPeq']").val()) || 0;
        var med = parseInt($("input[name='ProductoMed']").val()) || 0;
        var gra = parseInt($("input[name='ProductoGra']").val()) || 0;
        
        var total = (peq * 1000) + (med * 2000) + (gra * 3000);
        $("input[name='Resultado']").val(total);
    }
    
    // Actualiza el resultado inicialmente
    updateResult();

    $('.btn-number').click(function(e) {
        e.preventDefault();
        updateResult();
    });
    
    $('.input-number').change(function() {
        updateResult();
    });
    
    // El resto de tu script de manejo de botones y campos de entrada...
});

