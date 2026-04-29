import "./styles.css"
export default function Hero() {
    return (
        <section className="hero">
            <div className="hero__overlay">
                <div className="hero__content">
                    <h1 className="hero__title">De Narre Knollen</h1>
                    <p className="hero__subtitle">
                        Het mooiste carnaval van Soest begint hier
                    </p>

                    <div className="hero__actions">
                        <a href="/events" className="btn">Bekijk events</a>
                        <a href="#" className="btn btn--secondary">Word lid</a>
                    </div>
                </div>
            </div>
        </section>
    );
}