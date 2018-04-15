import nltk
from nltk.corpus import PlaintextCorpusReader
from nltk.corpus import stopwords



stop_words = set(stopwords.words('english'))
stop_words.update(['The', 'would'])


# Pre plan
files_pre = ".*\.txt"
corpus_pre = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Text\Pre plan text",
                                files_pre)
corpus2_pre = nltk.Text(corpus_pre.words())
filtered_corpus_pre = [w.lower() for w in corpus2_pre if not w in stop_words]
filtered_corpus2_pre = [word.lower() for word in filtered_corpus_pre if word.isalpha()]
fdistcorpus_pre = nltk.FreqDist(filtered_corpus2_pre)

# Resident engagement
files_res = ".*\.txt"
corpus_res = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Text\Resident engagement text",
                                files_res)
corpus2_res = nltk.Text(corpus_res.words())
filtered_corpus_res = [w.lower() for w in corpus2_res if not w in stop_words]
filtered_corpus2_res = [word.lower() for word in filtered_corpus_res if word.isalpha()]
fdistcorpus_res = nltk.FreqDist(filtered_corpus2_res)

# Cabinet meeting
files_cab = ".*\.txt"
corpus_cab = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Text\Cabinet meeting text",
                                files_cab)
corpus2_cab = nltk.Text(corpus_cab.words())
filtered_corpus_cab = [w.lower() for w in corpus2_cab if not w in stop_words]
filtered_corpus2_cab = [word.lower() for word in filtered_corpus_cab if word.isalpha()]
fdistcorpus_cab = nltk.FreqDist(filtered_corpus2_cab)


# Design and planning
files_des = ".*\.txt"
corpus_des = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Text\Design and planning text",
                                files_des)
corpus2_des = nltk.Text(corpus_des.words())
filtered_corpus_des = [w.lower() for w in corpus2_des if not w in stop_words]
filtered_corpus2_des = [word.lower() for word in filtered_corpus_des if word.isalpha()]
fdistcorpus_des = nltk.FreqDist(filtered_corpus2_des)

# Master Planning
files_mas = ".*\.txt"
corpus_mas = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Text\Master planning text",
                                files_mas)
corpus2_mas = nltk.Text(corpus_des.words())
filtered_corpus_mas = [w.lower() for w in corpus2_mas if not w in stop_words]
filtered_corpus2_mas = [word.lower() for word in filtered_corpus_mas if word.isalpha()]
fdistcorpus_mas = nltk.FreqDist(filtered_corpus2_mas)


# Post regeneration
files_post = ".*\.txt"
corpus_post = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Text\Post regeneration text",
                                files_post)
corpus2_post = nltk.Text(corpus_post.words())
filtered_corpus_post = [w.lower() for w in corpus2_post if not w in stop_words]
filtered_corpus2_post = [word.lower() for word in filtered_corpus_post if word.isalpha()]
fdistcorpus_post = nltk.FreqDist(filtered_corpus2_post)

print(fdistcorpus_pre.most_common)
print(fdistcorpus_res.most_common)
print(fdistcorpus_cab.most_common)
print(fdistcorpus_des.most_common)
print(fdistcorpus_mas.most_common)
print(fdistcorpus_post.most_common)
