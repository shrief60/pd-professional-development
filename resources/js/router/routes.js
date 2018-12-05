import Index from '../components/home';
import PageNotFound from '../components/errors/not_found';

import CoursesIndex from '../components/educator/courses/index';
import CoursesAdd from '../components/educator/courses/add';
import CoursesShow from '../components/educator/courses/show';
import CoursesUpdate from '../components/educator/courses/update';

import UnitsIndex from '../components/educator/units/index';
import UnitsAdd from '../components/educator/units/add';

import LessonsIndex from '../components/educator/lessons/index';
import LessonsAdd from '../components/educator/lessons/add';

export default [
    {
        path: '/',
        component: Index,
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
        path: '/:unit/lessons/show',
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
        path: '/courses/:course',
        name: 'courses.show',
        component: CoursesShow
    },
    {
        path: '/courses/edit/:course',
        name: 'courses.update',
        component: CoursesUpdate
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
