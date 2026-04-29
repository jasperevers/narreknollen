import {NavLink} from "react-router-dom";
import Hero from "../components/hero/Hero.tsx";
import EventsPreview from "../components/events/EventsPreview";
import AboutSection from "../components/AboutSection";
import CurrentHighnessSection from "../components/highness/CurrentHighnessSection.tsx";


export default function Home() {

    return (
        <>
            <Hero
                title="De Narre Knollen"
                subtitle="Het mooiste carnaval van Soest begint hier"
                backgroundImage="https://denarreknollen.nl/wp-content/uploads/2025/11/Groep-2025-2026-scaled.jpg"
                height="100vh"
                actions={
                    <>
                        <NavLink to="/events" className="btn">
                            Bekijk events
                        </NavLink>
                        <NavLink to="/about" className="btn btn--secondary">
                            Over ons
                        </NavLink>
                    </>
                }
            />
            <CurrentHighnessSection/>
            <AboutSection/>
            <EventsPreview/>
        </>
    );
}