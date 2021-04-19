import {bootstrap} from 'bootstrap';
import Url from 'urljs/src/url.min.js';

((D, B, W, log = arg => console.log(arg), $q = arg => D.querySelector(arg), $qAll = arg => D.querySelectorAll(arg)) => {
    $qAll('[data-sort]').forEach(el => {
        el.addEventListener('click', e => {
            e.preventDefault();
            let el = e.target;
            Url.updateSearchParam('sort', el.dataset.sort);
            Url.updateSearchParam('order', el.dataset.order);
            window.location.reload();
        })
    });

    $qAll('[data-pagination]').forEach(el => {
        el.addEventListener('click', e => {
            e.preventDefault();
            Url.updateSearchParam('page', e.target.dataset.pagination);
            window.location.reload();
        })
    })
})(document, document.body, window);