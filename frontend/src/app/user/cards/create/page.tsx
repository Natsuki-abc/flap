"use client";
import React, { useState } from "react";

const CardCreatePage = () => {
  const [front, setFront] = useState("");
  const [back, setBack] = useState("");
  const [deckId, setDeckId] = useState("");
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState<string | null>(null);
  const [success, setSuccess] = useState(false);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    setError(null);
    setSuccess(false);
    try {
      const res = await fetch("/api/cards", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          front,
          back,
          deck_id: deckId ? Number(deckId) : null,
        }),
      });
      if (!res.ok) {
        const data = await res.json();
        throw new Error(data.message || "作成に失敗しました");
      }
      setFront("");
      setBack("");
      setDeckId("");
      setSuccess(true);
    } catch (e: any) {
      setError(e.message);
    } finally {
      setLoading(false);
    }
  };

  return (
    <main className="max-w-md mx-auto p-4">
      <h1 className="text-2xl font-bold mb-4">カード作成</h1>
      <form onSubmit={handleSubmit} className="space-y-4">
        <div>
          <label className="block mb-1">デッキID</label>
          <input
            type="number"
            value={deckId}
            onChange={e => setDeckId(e.target.value)}
            className="border px-2 py-1 w-full"
            required
          />
        </div>
        <div>
          <label className="block mb-1">表面</label>
          <input
            type="text"
            value={front}
            onChange={e => setFront(e.target.value)}
            className="border px-2 py-1 w-full"
            required
          />
        </div>
        <div>
          <label className="block mb-1">裏面</label>
          <input
            type="text"
            value={back}
            onChange={e => setBack(e.target.value)}
            className="border px-2 py-1 w-full"
            required
          />
        </div>
        <button
          type="submit"
          className="bg-blue-600 text-white px-4 py-2 rounded disabled:opacity-50"
          disabled={loading}
        >
          {loading ? "作成中..." : "作成"}
        </button>
        {error && <div className="text-red-600 mt-2">{error}</div>}
        {success && <div className="text-green-600 mt-2">カードを作成しました！</div>}
      </form>
    </main>
  );
};

export default CardCreatePage;
