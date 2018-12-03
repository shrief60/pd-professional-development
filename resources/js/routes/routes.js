import home from '../components/home';
import PageNotFound from '../components/errors/not_found';

import CoursesIndex from '../components/courses/index';
import CoursesAdd from '../components/courses/add';
// import CoursesUpdate from '../components/courses/update';
// import CoursesShow from '../components/courses/show';

import UnitsIndex from '../components/units/index';
import UnitsAdd from '../components/units/add';


import LessonsIndex from '../components/lessons/index';
import LessonsAdd from '../components/lessons/add';

const routes = [
    {
        path: '/',
        component: home,
        name: 'home'
    },

    /*====================================*/
    {
        path: '/:unit/lessons',
        name: 'lessons.index',
        component: LessonsIndex
    },
    {
        path: '/:unit/lessons/add',
        name: 'lessons.add',
        component: LessonsAdd
    },

    {
        path: '/lessons/show',
        name: 'lessons.show',
        component: LessonsAdd
    },
    /*====================================*/

    /*====================================*/

    {
        path: '/:course/units',
        name: 'units.index',
        component: UnitsIndex
    },
    {
        path: '/:course/units/add',
        name: 'units.add',
        component: UnitsAdd
    },

    /*====================================*/


    /*====================================*/
    {
        path: '/courses',
        name: 'courses.index',
        component: CoursesIndex
    },
    {
        path: '/courses/add',
        name: 'courses.add',
        component: CoursesAdd
    },
    /*====================================*/

    {
        path: '*',
        name: 'not-found',
        component: PageNotFound
    }

];

export default routes;
