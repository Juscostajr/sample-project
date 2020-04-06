import Vue from 'vue'
import Router from 'vue-router'

import Main from '@/components/Main'
import PriceList from '@/components/PriceList'
import Shipping from '@/components/Shipping'

Vue.use(Router)

const routes = [
    {
        path: '/app/',
        component: Main,
        children: [
            {
                name: 'pricelist',
                path: '/pricelist/',
                component: PriceList
            },
            
            {
                name: 'shipping',
                path: '/shipping/',
                component: Shipping
            },
            {
                name: 'home',
                path: '/',
                component: Shipping
            },
        ]
    },

]



const router = new Router({ routes })

export default router