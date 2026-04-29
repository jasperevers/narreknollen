import Hero from "../components/hero/Hero.tsx";
import EventsPreview from "../components/events/EventsPreview";
import AboutSection from "../components/AboutSection";
import CurrentHighnessSection from "../components/highness/CurrentHighnessSection.tsx";


export default function Home() {

    return (
        <>
            <Hero />
            <CurrentHighnessSection />
            <AboutSection />
            <EventsPreview />
        </>
    );
}