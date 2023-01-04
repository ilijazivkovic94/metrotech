import Home from "./pages/Home";
import Chat from "./pages/Chat";
import Login from "./pages/Auth/Login";
import Register from "./pages/Auth/Register";
import Classes from "./pages/Classes";
import ClassesEsportsCoding from "./pages/ClassesEsportsCoding";
import Compete from "./pages/Compete";
import ClassesCodingTech from "./pages/ClassesCodingTech";
import CompeteAcLeague from "./pages/CompeteAcLeague";
import TemplateAcLeague from "./pages/TemplateAcLeague";
import FightForChange from "./pages/FightForChange";
import AcMineCraft from "./pages/AcMineCraft";
import NflFlag from "./pages/NflFlag";
import OnlineCoaching from "./pages/OnlineCoaching";
import Contact from "./pages/Contact";
import Pricing from "./pages/Pricing";
import DBRegister from "./pages/DBRegister";

export const routes = [

    { path: '/', redirect: 'home'},
    {
        path: '/login', component: Login, name: 'login', meta: {
            auth: false
        }
    },
    {
        path: '/register', component: Register, name: 'register', meta: {
            auth: false
        }
    },

    { path: '/home', component: Home, name:'home'},
    { path: '/chat', component: Chat, name:'chat'},
    { path: '/db_register/:entity_id', component: DBRegister, name:'db_register' },
    { path: '/classes', component: Classes, name:'classes'},
    { path: '/classes/esports_coding', component: ClassesEsportsCoding, name:'classes_esports_coding'},
    { path: '/classes/coding_tech', component: ClassesCodingTech, name:'classes_coding_tech'},

    { path: '/compete', component: Compete, name:'compete'},
    { path: '/leagues/ac_league', component: CompeteAcLeague, name:'compete_ac_league'},
    { path: '/leagues/ac_mine_craft', component: AcMineCraft, name:'ac_mine_craft'},
    { path: '/tournaments/fight_for_change', component: FightForChange, name:'fight_for_change'},

    { path: '/tournaments/nfl_flag', component: NflFlag, name:'nfl_flag'},
    { path: '/online_coaching', component: OnlineCoaching, name:'online_coaching'},
    { path: '/contact', component: Contact, name:'contact'},
    { path: '/pricing', component: Pricing, name:'pricing'},
    { path: '/pages/:page_slug', component: TemplateAcLeague, name:'show_league' },
];
