import "./styles.css";
import type { ReactNode } from "react";

type HeroVariant = "full" | "large" | "medium" | "small";

type HeroProps = {
    title: string;
    subtitle?: string;
    backgroundImage: string;
    variant?: HeroVariant;
    actions?: ReactNode;
};

export default function Hero({
                                 title,
                                 subtitle,
                                 backgroundImage,
                                 variant = "full",
                                 actions,
                             }: HeroProps) {
    return (
        <section
            className={`hero hero--${variant}`}
            style={{
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