import Login from "./view/login/login.vue"
import Home from "./view/home/home.vue"
import Search from "./view/pages/search.vue"
import User from "./view/pages/user.vue"
import Personal from "./view/pages/personal.vue"
import PersonalRequire from "./view/pages/personalRequire.vue"
import QuarterRequire from "./view/pages/quarterRequire.vue"
import RequireProgress from "./view/pages/requireProgress.vue"
import PlanRecord from "./view/pages/planRecord.vue"
import WorktimeRecord from "./view/pages/worktimeRecord.vue"

const Routers = [
  {path: "/login", name: "login", access: [], component: Login},
  {path: "/home", name: "home", meta: { requireAuth: true }, access: [], component: Home,
    children: [
      {path: "/home/personal/search", name: "search", meta: { requireAuth: true }, access: [], component: Search},
      {path: "/home/personal/user", name: "user", meta: {requireAuth: true}, access: [],component: User},
      {path: "/home/personal/personal", name: "personal", meta: { requireAuth: true }, access: [], component: Personal},
      {path: "/home/require/personalrequire", name: "personalrequire", meta: { requireAuth: true }, access: [], component: PersonalRequire},
      {path: "/home/require/quarterrequire", name: "quarterrequire", meta: { requireAuth: true }, access: [], component: QuarterRequire},
      {path: "/home/require/requireprogress", name: "requireprogress", meta: { requireAuth: true }, access: [], component: RequireProgress},
      {path: "/home/record/planrecord", name: "planrecord", meta: { requireAuth: true }, access: [], component: PlanRecord},
      {path: "/home/record/worktimerecord", name: "worktimerecord", meta: { requireAuth: true }, access: [], component: WorktimeRecord}
    ]
  },
  
  
];

export const routers = [
  ...Routers,
];