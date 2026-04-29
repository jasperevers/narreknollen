import "./styles.css";
import type { ReactNode } from "react";

type HeroProps = {
    title: string;
    subtitle?: string;
    backgroundImage: string;
    height?: string; // bv "100vh", "60vh"
    actions?: ReactNode;
};

export default function Hero({
                                 title,
                                 subtitle,
                                 backgroundImage,
                                 height = "100vh",
                                 actions,
                             }: HeroProps) {
    return (
        <section
            className="hero"
            style={{
                height,
                backgroundImage: `url(${backgroundImage})`,
            }}
        >
            <div className="hero__overlay">
                <div className="hero__content">
                    <h1 className="hero__title">{title}</h1>

                    {subtitle && (
                        <p className="hero__subtitle">{subtitle}</p>
                    )}

                    {actions && (
                        <div className="hero__actions">{actions}</div>
                    )}
                </div>
            </div>
        </section>
    );
}