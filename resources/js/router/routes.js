import Index from '../components/home';
import PageNotFound from '../components/errors/not_found';

import CoursesIndex from '../components/educator/courses/index';
import CoursesAdd from '../components/educator/courses/add';
import CoursesShow from '../components/educator/courses/show';
import CoursesUpdate from '../components/educator/courses/update';

import UnitsIndex from '../components/educator/units/index';
import UnitsAdd from '../components/educator/units/add';
import UnitsUpdate from '../components/educator/units/update';


import LessonsIndex from '../components/educator/lessons/index';
import LessonsAdd from '../components/educator/lessons/add';
import LessonsShow from '../components/educator/lessons/show';

export default [
    {
        path: "/",
        component: Index,
        name: "home"
    },

    /*====================================*/
    {
        path: "/:unit/lessons",
        name: "lessons.index",
        component: LessonsIndex
    },
    {
        path: "/:unit/lessons/add",
        name: "lessons.add",
        component: LessonsAdd
    },
    {
        path: "/lessons/:lesson",
        name: "lessons.show",
        component: LessonsShow
    },
    {
        path: "/lessons/:lesson/edit",
        name: "lessons.update",
        // component: LessonsUpdate
    },
    /*====================================*/

    /*====================================*/

    {
        path: "/:course/units",
        name: "units.index",
        component: UnitsIndex
    },
    {
        path: "/:course/units/add",
        name: "units.add",
        component: UnitsAdd
    },
    {
        path: "/units/:unit/edit",
        name: "units.update",
        component: UnitsUpdate
    },

    /*====================================*/

    /*====================================*/
    {
        path: "/courses",
        name: "courses.index",
        component: CoursesIndex
    },
    {
        path: "/courses/add",
        name: "courses.add",
        component: CoursesAdd
    },
    {
        path: "/courses/:course",
        name: "courses.show",
        component: CoursesShow
    },
    {
        path: "/courses/:course/edit",
        name: "courses.update",
        component: CoursesUpdate
    },
    /*====================================*/

    {
        name: "404",
        path: "/404",
        component: PageNotFound
    },
    {
        path: "*",
        redirect: { name: "404" }
    }
];
