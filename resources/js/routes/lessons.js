import LessonsIndex from '../components/lessons/index';
import LessonsCreate from '../components/lessons/create';

const lessons = [
    {
        path: '/admin/lessons',
        name: 'lessons.index',
        component: LessonsIndex
    },
    {
        path: '/admin/lessons/create',
        name: 'lessons.create',
        component: LessonsCreate
    },
];

module.exports = lessons;
