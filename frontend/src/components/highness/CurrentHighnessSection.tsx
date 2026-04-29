import "./styles.css";

export default function CurrentHighnessSection() {
    return (
        <section className="section container">
            <div className="highness">

                {/* TITLE */}
                <h2 className="highness__title">
                    Huidige hoogheid
                </h2>

                <p className="highness__subtitle">
                    Onze regerende hoogheid van dit seizoen
                </p>

                {/* IMAGE */}
                <div className="highness__imageWrapper">
                    <img
                        src="https://denarreknollen.nl/wp-content/uploads/2025/11/MG_8104b-scaled.jpg"
                        alt="Current Highness"
                        className="highness__image"
                    />
                </div>

                {/* DUO INFO */}
                <div className="highness__info">

                    <div className="highness__person">
                        <p className="highness__roleLabel">Prins</p>
                        <p className="highness__name">Martijn I</p>
                    </div>

                    <div className="highness__person">
                        <p className="highness__roleLabel">Adjudant</p>
                        <p className="highness__name">Martin</p>
                    </div>

                </div>

            </div>
        </section>
    );
}