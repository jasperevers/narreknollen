import { fetchAPI } from "./client";

export interface WPPost {
    id: number;
    title: {
        rendered: string;
    };
    excerpt: {
        rendered: string;
    };
    date: string;
}

export function getPosts() {
    return fetchAPI<WPPost[]>("posts");
}