import {createRouter, createWebHistory} from 'vue-router';
import FruitsList from './components/FruitsList';
import FruitItem from './components/FruitItem';
import FruitForm from './components/FruitForm';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            name: 'fruits',
            path: '/',
            component: FruitsList,
        },
        {
            name: 'fruit-form',
            path: '/fruit/edit/:bookId?',
            component: FruitForm,
            props: true,
            alias: '/fruit/add'
        },
        {
            name: 'book-item',
            path: '/fruit/:fruitId(\\d+)',
            component: FruitItem,
            props: true
        },
    ],
});

export default router;
