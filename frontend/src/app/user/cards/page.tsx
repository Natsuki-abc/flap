"use client";
import React, { useEffect, useState } from "react";

interface Card {
  id: number;
  deck_id: number;
  front: string;
  back: string;
  created_at: string;
  updated_at: string;
}

const CardListPage = () => {
  const [cards, setCards] = useState<Card[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const fetchCards = async () => {
      try {
        const res = await fetch("/api/cards");
        if (!res.ok) throw new Error("データ取得に失敗しました");
        const data = await res.json();
        setCards(data);
      } catch (e: any) {
        setError(e.message);
      } finally {
        setLoading(false);
      }
    };
    fetchCards();
  }, []);

  if (loading) return <div>読み込み中...</div>;
  if (error) return <div>エラー: {error}</div>;

  return (
    <main className="max-w-2xl mx-auto p-4">
      <h1 className="text-2xl font-bold mb-4">カード一覧</h1>
      <table className="min-w-full border">
        <thead>
          <tr>
            <th className="border px-2 py-1">ID</th>
            <th className="border px-2 py-1">表面</th>
            <th className="border px-2 py-1">裏面</th>
            <th className="border px-2 py-1">デッキID</th>
          </tr>
        </thead>
        <tbody>
          {cards.map(card => (
            <tr key={card.id}>
              <td className="border px-2 py-1">{card.id}</td>
              <td className="border px-2 py-1">{card.front}</td>
              <td className="border px-2 py-1">{card.back}</td>
              <td className="border px-2 py-1">{card.deck_id}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </main>
  );
};

export default CardListPage;
