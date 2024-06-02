import { initializeConfigurationJS as ConfigJS } from './configuration.js';

let table = new DataTable('#example', {
    rowReorder: true,
    columnDefs: [
        {
            targets: 0, className: `text-center col-1 grab`,
            render: function (data) {
                return `<span class="d-none"></span>
            <span class="fas fa-grip-lines"></span>`;
            }
        },
        {
            targets: 1, className: ``,
            // render: function (data) {
            //     return ``;
            // }
        },

        // {
        //     targets: 2, className: `d-none`,
        //     render: function (data) {
        //         const DATA = `${data}` !== undefined && `${data}` !== '' ? `${data}` : '';
        //         return `<div class="text-truncate">${DATA}</div>`;
        //     }
        // }
    ],
    select: {
        style: 'multi',
        selector: 'row'
    },
    layout: {
        bottomStart: null,
        bottomEnd: null,
        topStart: null,
        topEnd: null,
        bottom: function () {
            let toolbar = document.createElement('div');
            toolbar.innerHTML = `<button class="add-new text-uppercase" id="add-new">
                                    Add New Rule
                                </button>`;

            return toolbar;
        }
    },
    scrollY: '4.5rem ',
    scrollCollapse: true,
    paging: false,
    initComplete: function (settings, json) {


    }
});
